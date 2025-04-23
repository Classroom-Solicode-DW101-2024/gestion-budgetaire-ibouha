<!-- navbar -->
<?php
include "../../config/config.php" ;
$current = basename($_SERVER['PHP_SELF']);

?>
<link rel="stylesheet" href="../../public/style/landing.css">
<header x-data="{ open: false }" class="w-full text-gray-700 bg-white shadow-md ">
    <div data-aos="fade-down" data-aos-duration="1500" class="flex max-w-screen-xl px-8 mx-auto md:items-center md:justify-between md:flex-row">
        <div class="flex flex-row items-center justify-between py-4">
            <div class="relative <?php echo isset($_SESSION['user']) ? 'md:mt-0' : 'md:mt-8'; ?>">
                <a href="./dashboard.php" class="text-lg relative z-50 font-bold tracking-widest text-gray-900 rounded-lg focus:outline-none focus:shadow-outline">SpendWise</a>
                <svg class="h-11 z-40 absolute -top-2 -left-3" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.2574 2.24264C37.6005 -0.100501 41.3995 -0.100505 43.7426 2.24264L76.7574 35.2574C79.1005 37.6005 79.1005 41.3995 76.7574 43.7426L43.7426 76.7574C41.3995 79.1005 37.6005 79.1005 35.2574 76.7574L2.24264 43.7426C-0.100501 41.3995 -0.100505 37.6005 2.24264 35.2574L35.2574 2.24264Z" fill="#65DAFF" />
                </svg>
            </div>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav class="h-full flex justify-center items-center font-bold text-gray-600 gap-5">
            <a href="./dashboard.php" class="py-4 <?= $current === 'dashboard.php' ? 'text-yellow-500 border-b-4 border-yellow-500' : '' ?>">Dashboard</a>
            <a href="./transactions.php" class="py-4 <?= $current === 'transactions.php' ? 'text-yellow-500 border-b-4 border-yellow-500' : '' ?>">Budgets</a>
            <a href="./categories.php" class="py-4 <?= $current === 'categories.php' ? 'text-yellow-500 border-b-4 border-yellow-500' : '' ?>">Categories</a>
        </nav>
            <!-- Dropdown Container -->
            <div class="relative inline-block text-left" id="menu-dropdown">
                <!-- Dropdown Button -->
                <button type="button" id="dropdown-button" class="inline-flex items-center justify-center gap-2 focus:outline-none">
                    <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile image">

                    <span class="font-bold text-gray-800"> <?php echo isset($_SESSION['user']) ? $_SESSION['user']['nom'] : 'User Name'; ?>
                    </span>
                    <svg class="w-6 h-6  opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Content (Hidden by default with 'hidden' class) -->
                <div id="dropdown-menu" class="absolute right-0 hidden w-60 mt-2 origin-top-right bg-gray-800 divide-y divide-gray-700 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-[100]">
                    <!-- User Profile Section -->
                    <div class="px-4 py-3">
                        <div class="flex items-center space-x-3">
                            <div class="space-y-1">
                                
                                <p class="text-sm text-gray-500 truncate">
                                    <?php echo isset($_SESSION['user']) ? $_SESSION['user']["email"] : 'User Email'; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Items -->
                    <div class="py-1">
                        <a href="../../actions/handle_logout.php" class="flex items-center px-4 py-2 text-sm text-red-500 hover:bg-gray-700 group">
                            <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M9 12h12l-3 -3"></path>
                                <path d="M18 15l3 -3"></path>
                            </svg>
                            Log out
                        </a>
                    </div>
                </div>
            </div>
      

    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        // Toggle dropdown when button is clicked
        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInside = dropdownButton.contains(event.target) || dropdownMenu.contains(event.target);

            if (!isClickInside && !dropdownMenu.classList.contains('hidden')) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>