<?php
require_once '../../config/config.php';
require_once '../../includes/functions/transactions.php';
require_once '../../includes/functions/dashboard.php';
require_once '../../includes/helpers/validator.php';
include "../partials/header_dashboard.php";

$success = '';
if (isset($_SESSION['transaction_success'])) {
    $success = $_SESSION['transaction_success'];
    unset($_SESSION['transaction_success']);
}

// Handle validation errors
$errors = [];
if (isset($_SESSION['transaction_errors'])) {
    $errors = $_SESSION['transaction_errors'];
    unset($_SESSION['transaction_errors']);
}

// Fetch categories
$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get current year and month
$currentYearMonth = date('Y-m');

// Get selected month if filter is applied
$selectedYearMonth = isset($_GET['month']) ? $_GET['month'] : $currentYearMonth;

// Extract year and month from the selected value
if (isset($_GET['filter']) && $_GET['filter'] === 'month' && !empty($selectedYearMonth)) {
    list($selectedYear, $selectedMonth) = explode('-', $selectedYearMonth);
    $transactions = listTransactionsByMonth($pdo, $selectedYear, $selectedMonth);
} else {
    $transactions = listTransactions($pdo);
}

// Format selected month for display
$monthDisplay = '';
if (isset($_GET['filter']) && $_GET['filter'] === 'month' && !empty($selectedYearMonth)) {
    $timestamp = strtotime($selectedYearMonth . '-01');
    $monthDisplay = date('F Y', $timestamp);
}

// Group categories by type for JavaScript
$categoriesByType = [
    'revenu' => [],
    'depense' => []
];

foreach ($categories as $category) {
    if (isset($category['type'])) {
        $categoriesByType[$category['type']][] = [
            'id' => $category['id'],
            'nom' => $category['nom']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpendWise | Budgets</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Budgets</h1>
                    <p class="mt-1 text-sm text-gray-500">Manage your income and expenses</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <button id="openModalButton" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-lg shadow-sm transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        <i class="fas fa-plus mr-2"></i> Create New Budget
                    </button>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <?php if (!empty($success)): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                    </div>
                    <div class="ml-3">
                        <p><?= htmlspecialchars($success) ?></p>
                    </div>
                    <button class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-200 inline-flex h-8 w-8" onclick="this.parentElement.parentElement.remove()">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Filter Section -->
        <div class="bg-white shadow-sm rounded-lg mb-8">
            <div class="px-6 py-5 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Filter Transactions</h3>
            </div>
            <div class="px-6 py-5 bg-yellow-50">
                <form action="" method="GET" class="flex flex-wrap items-end gap-4">
                    <div class="w-full md:w-auto">
                        <label for="month" class="block text-sm font-medium text-gray-700 mb-1">Select Month</label>
                        <input type="month" id="month" name="month" value="<?= htmlspecialchars($selectedYearMonth) ?>" 
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 py-2 px-3">
                    </div>
                    
                    <div class="flex gap-2">
                        <input type="hidden" name="filter" value="month">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-filter mr-2"></i> Apply Filter
                        </button>
                        
                        <a href="transaction.php" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <i class="fas fa-times mr-2"></i> Clear
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Current filter display -->
        <?php if (isset($_GET['filter']) && $_GET['filter'] === 'month' && !empty($monthDisplay)): ?>
        <div class="mb-6 bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-500"></i>
                </div>
                <div class="ml-3">
                    <p>Showing transactions for: <span class="font-medium"><?= $monthDisplay ?></span></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Transactions Grid -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Transaction History</h2>
            
            <?php if (empty($transactions)): ?>
                <div class="bg-white shadow-sm rounded-lg p-8 text-center">
                    <div class="inline-block p-4 bg-gray-100 rounded-full mb-4">
                        <i class="fas fa-receipt text-gray-400 text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">No transactions found</h3>
                    <p class="text-gray-500">There are no transactions for the selected period.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($transactions as $transaction): ?>
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 border-t-4 <?= $transaction['type'] === 'revenu' ? 'border-green-500' : 'border-red-500' ?>">
                            <div class="p-5">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-lg font-semibold text-gray-900 truncate" title="<?= htmlspecialchars($transaction['description']) ?>">
                                        <?= htmlspecialchars($transaction['description']) ?>
                                    </h3>
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium <?= $transaction['type'] === 'revenu' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                        <?= ucfirst($transaction['type']) ?>
                                    </span>
                                </div>
                                
                                <div class="flex items-center mb-4">
                                    <div class="<?= $transaction['type'] === 'revenu' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?> rounded-full p-2 mr-3">
                                        <i class="fas <?= $transaction['type'] === 'revenu' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                                    </div>
                                    <div>
                                        <p class="text-2xl font-bold <?= $transaction['type'] === 'revenu' ? 'text-green-600' : 'text-red-600' ?>">
                                            <?= $transaction['type'] === 'revenu' ? '+' : '-' ?><?= number_format($transaction['montant'], 2) ?> DH
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center text-gray-500 text-sm mb-4">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    <span><?= date('d F Y', strtotime($transaction['date_transaction'])) ?></span>
                                </div>

                                <hr class="my-3 border-gray-200">
                                
                                <div class="flex justify-between items-center">
                                    <a href="../../actions/edit_transaction.php?id=<?= $transaction['id'] ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="../../actions/handle_delete_transaction.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                        <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>">

                                        <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800 text-sm font-medium">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Modal -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
            <div class="bg-white rounded-xl shadow-xl max-w-md w-full max-h-screen overflow-y-auto m-4">
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10">
                    <h3 class="text-xl font-semibold text-gray-900">Add New Budget</h3>
                    <button id="closeModalButton" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Form -->
                <div class="px-6 py-4">
                    <form action="../../actions/handle_transaction.php" method="POST">
                        <div class="space-y-5">
                            <!-- Type Field -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Transaction Type</label>
                                <select name="type" id="type" class="block w-full py-3 rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                    <option value="">-- Select type --</option>
                                    <option value="revenu">Income</option>
                                    <option value="depense">Expense</option>
                                </select>
                                <?php if (!empty($errors['type'])): ?>
                                    <p class="mt-1 text-sm text-red-600"><?= $errors['type'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Amount Field -->
                            <div>
                                <label for="montant" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">DH</span>
                                    </div>
                                    <input type="number" step="0.01" name="montant" id="montant" class="block w-full py-3 pl-12 pr-12 rounded-md border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" placeholder="0.00">
                                </div>
                                <?php if (!empty($errors['montant'])): ?>
                                    <p class="mt-1 text-sm text-red-600"><?= $errors['montant'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Category Field -->
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select name="category" id="category" class="block py-3 w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                    <option value="">-- Select category --</option>
                                    <!-- Categories will be populated based on the selected type via JavaScript -->
                                </select>
                                <?php if (!empty($errors['category'])): ?>
                                    <p class="mt-1 text-sm text-red-600"><?= $errors['category'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="description" id="description" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" placeholder="Enter a description..."></textarea>
                            </div>

                            <!-- Date Field -->
                            <div>
                                <label for="date_transaction" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                <input type="date" name="date_transaction" id="date_transaction" class="block w-full py-3 rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                <?php if (!empty($errors['date_transaction'])): ?>
                                    <p class="mt-1 text-sm text-red-600"><?= $errors['date_transaction'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-300">
                                <i class="fas fa-plus-circle mr-2"></i> Create Budget
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    const modal = document.getElementById('modal');
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');
    const typeSelect = document.getElementById('type');
    const categorySelect = document.getElementById('category');
    
    const categoriesByType = <?php echo json_encode($categoriesByType); ?>;
    console.log(categoriesByType);
    
    function updateCategories(selectedType) {
        categorySelect.innerHTML = '<option value="">-- Select category --</option>'; 

        if (!selectedType) return;
        
        const categories = categoriesByType[selectedType] || [];
        
        categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.id;
            option.textContent = category.nom;
            categorySelect.appendChild(option);
        });
    }
    
    typeSelect.addEventListener('change', function() {
        updateCategories(this.value);
    });
    
    openModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add("flex");
        document.body.style.overflow = 'hidden'; 
    });

    closeModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove("flex");
        document.body.style.overflow = ''; 
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove("flex");
            document.body.style.overflow = ''; 
        }
    });

    const successAlert = document.querySelector('.bg-green-100');
    if (successAlert) {
        setTimeout(() => {
            successAlert.remove();
        }, 5000);
    }
    </script>
</body>
</html>