<?php
include "../partials/header_dashboard.php";

if (isset(["user"]['user_id'])) {
    header('location:../auth/login.php');
}
$showPopup = false;

if (isset($_SESSION['show_welcome_popup'])) {
    $showPopup = true;
    unset($_SESSION['show_welcome_popup']); // Show it only once
}
require_once '../../config/config.php';
require_once '../../includes/functions/dashboard.php';
require_once '../../includes/functions/transactions.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../auth/login.php');
    exit;
}

$user = $_SESSION['user'];
$user_id = $user['id'];

$currentYear = date('Y');
$currentMonth = date('m');

$solde = soldUser($pdo);
$details = detailsUser($pdo);
$incomesByCategory = totalIncomesByCategory($pdo);
$expensesByCategory = totalExpensesByCategory($pdo);
$maxIncome = getMaxTransaction($pdo, 'revenu', $currentYear, $currentMonth);
$maxExpense = getMaxTransaction($pdo, 'depense', $currentYear, $currentMonth);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpendWise | Dashboard</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="bg-gray-50 font-sans">
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Header with welcome message -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-indigo-800">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-700 to-purple-600">
                    Welcome, <?= htmlspecialchars($user['nom']) ?> 👋
                </span>
            </h1>
            <div class="text-right">
                <p class="text-sm text-gray-500"><?= date('F Y') ?></p>
                <p class="text-xs text-gray-400">Last updated: <?= date('d M, H:i') ?></p>
            </div>
        </div>

        <!-- Current Balance Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8 transition-transform transform hover:scale-102 border border-gray-100">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-medium text-gray-600">Current Balance</h2>
                        <p class="text-3xl font-bold mt-2 <?= $solde >= 0 ? 'text-green-600' : 'text-red-600' ?>">
                            <?= number_format($solde, 2) ?> DH
                        </p>
                    </div>
                    <div class="bg-<?= $solde >= 0 ? 'green' : 'red' ?>-100 p-3 rounded-full">
                        <i class="fas fa-<?= $solde >= 0 ? 'wallet' : 'exclamation-circle' ?> text-<?= $solde >= 0 ? 'green' : 'red' ?>-500 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Summary -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Income Summary -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 transition-all hover:shadow-md">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-4 py-3">
                    <h3 class="text-white font-medium">Total Income </h3>
                </div>
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-arrow-down text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-green-600">
                                <?= number_format($details['revenus'], 2) ?> DH
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expense Summary -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 transition-all hover:shadow-md">
                <div class="bg-gradient-to-r from-red-500 to-rose-600 px-4 py-3">
                    <h3 class="text-white font-medium">Total Expenses </h3>
                </div>
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <i class="fas fa-arrow-up text-red-600"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-red-600">
                                <?= number_format($details['depenses'], 2) ?> DH
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Income Categories -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Income by Category</h3>
                    <span class="bg-green-100 text-green-600 text-xs font-medium px-2 py-1 rounded-full">
                        <?= count($incomesByCategory) ?> Categories
                    </span>
                </div>
                
                <?php if (empty($incomesByCategory)): ?>
                    <div class="text-center py-6 text-gray-500">
                        <i class="fas fa-chart-bar text-gray-300 text-3xl mb-2"></i>
                        <p>No income data available</p>
                    </div>
                <?php else: ?>
                    <ul class="space-y-3">
                        <?php foreach ($incomesByCategory as $income): ?>
                            <li class="flex items-center justify-between py-2 border-b border-gray-100">
                                <div class="flex items-center">
                                    <span class="inline-block w-3 h-3 bg-green-500 rounded-full mr-3"></span>
                                    <span class="text-gray-700"><?= htmlspecialchars($income['nom']) ?></span>
                                </div>
                                <span class="font-medium text-green-600"><?= number_format($income['total'], 2) ?> DH</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Expense Categories -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Expenses by Category</h3>
                    <span class="bg-red-100 text-red-600 text-xs font-medium px-2 py-1 rounded-full">
                        <?= count($expensesByCategory) ?> Categories
                    </span>
                </div>
                
                <?php if (empty($expensesByCategory)): ?>
                    <div class="text-center py-6 text-gray-500">
                        <i class="fas fa-chart-pie text-gray-300 text-3xl mb-2"></i>
                        <p>No expense data available</p>
                    </div>
                <?php else: ?>
                    <ul class="space-y-3">
                        <?php foreach ($expensesByCategory as $expense): ?>
                            <li class="flex items-center justify-between py-2 border-b border-gray-100">
                                <div class="flex items-center">
                                    <span class="inline-block w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                                    <span class="text-gray-700"><?= htmlspecialchars($expense['nom']) ?></span>
                                </div>
                                <span class="font-medium text-red-600"><?= number_format($expense['total'], 2) ?> DH</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>

        <!-- Max Transactions Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Max Income Transaction -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center mb-4">
                    <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                    Highest Income
                </h3>
                
                <?php if ($maxIncome): ?>
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-arrow-trend-up text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-green-600"><?= number_format($maxIncome['montant'], 2) ?> DH</p>
                            <p class="text-gray-700 font-medium mt-1"><?= htmlspecialchars($maxIncome['description']) ?></p>
                            <p class="text-xs text-gray-500 mt-1"><?= $maxIncome['date_transaction'] ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4 text-gray-500">
                        <i class="fas fa-info-circle text-gray-400 mb-2"></i>
                        <p>No income transactions recorded</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Max Expense Transaction -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center mb-4">
                    <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                    Highest Expense
                </h3>
                
                <?php if ($maxExpense): ?>
                    <div class="flex items-start space-x-4">
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-arrow-trend-down text-red-600"></i>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-red-600"><?= number_format($maxExpense['montant'], 2) ?> DH</p>
                            <p class="text-gray-700 font-medium mt-1"><?= htmlspecialchars($maxExpense['description']) ?></p>
                            <p class="text-xs text-gray-500 mt-1"><?= $maxExpense['date_transaction'] ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4 text-gray-500">
                        <i class="fas fa-info-circle text-gray-400 mb-2"></i>
                        <p>No expense transactions recorded</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Quick Action Buttons -->
        <!-- <div class="flex flex-wrap gap-4 justify-center mt-6">
            <a href="add_transaction.php" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-6 rounded-lg font-medium transition flex items-center">
                <i class="fas fa-plus mr-2"></i> Add Transaction
            </a>
            <a href="reports.php" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-6 rounded-lg font-medium transition flex items-center">
                <i class="fas fa-chart-line mr-2"></i> View Reports
            </a>
            <a href="categories.php" class="bg-emerald-600 hover:bg-emerald-700 text-white py-2 px-6 rounded-lg font-medium transition flex items-center">
                <i class="fas fa-tags mr-2"></i> Manage Categories
            </a>
        </div> -->
    </div>

    <!-- Welcome Popup -->
    <?php if ($showPopup): ?>
    <div x-data="{ show: true }" x-show="show" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="bg-white rounded-xl p-8 max-w-md w-full shadow-xl" x-show="show" 
             x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0 transform scale-90" 
             x-transition:enter-end="opacity-100 transform scale-100">
            <div class="text-center mb-4">
                <div class="inline-block p-4 bg-green-100 rounded-full mb-4">
                    <i class="fas fa-check-circle text-4xl text-green-500"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Great Job!</h2>
            </div>
            <p class="text-gray-700 text-center mb-6">
                You just took your first step to get your money into shape! The second step is to add your first transaction.
            </p>
            <div class="flex justify-center">
                <button @click="show = false"
                    class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white px-6 py-3 rounded-lg font-medium transition-all shadow-md hover:shadow-lg">
                    Let's Go!
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>
</html>