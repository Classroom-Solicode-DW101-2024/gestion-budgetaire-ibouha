<!-- navbar -->

<header x-data="{ open: false }" class="w-full text-gray-700 bg-cream">
    <div data-aos="fade-down" data-aos-duration="1500" class="flex flex-col max-w-screen-xl px-8 mx-auto md:items-center md:justify-between md:flex-row">
        <div class="flex flex-row items-center justify-between py-3">
            <div class="relative md:mt-8">
                <a href="/gestion-budgetaire-ibouha/" class="text-lg relative z-50 font-bold tracking-widest text-gray-900 rounded-lg focus:outline-none focus:shadow-outline">SpendWise</a>
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
        
        <nav :class="{ 'transform md:transform-none': !open, 'h-full': open }" class="h-0 md:h-auto flex flex-col flex-grow md:items-center pb-4 md:pb-0 md:flex md:justify-end md:flex-row origin-top duration-300 scale-y-0">
            <a href="#">
                <button class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg md:mt-8 md:ml-4 focus:outline-none focus:shadow-outline hover:text-yellow-500 transition-colors duration-300 ">Home</button></a>
            <a href="#">
                <button class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg md:mt-8 md:ml-4 focus:outline-none focus:shadow-outline hover:text-yellow-500 transition-colors duration-300 ">Blog</button></a>
            <a href="#">
                <button class="px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded-lg md:mt-8 md:ml-4 focus:outline-none focus:shadow-outline hover:text-yellow-500 transition-colors duration-300">About Us</button></a>

            <a href="/gestion-budgetaire-ibouha/views/auth/login.php"><button class="px-10 py-3 mt-2 text-sm font-bold text-center border border-yellow-500 bg-white hover:bg-yellow-500 hover:text-white transition-all ease-in text-gray-800 rounded-full md:mt-8 md:ml-4">Login</button></a>
            <a href="/gestion-budgetaire-ibouha/views/auth/register.php"><button class="px-10 py-3 mt-2 text-sm font-bold text-center bg-yellow-500 hover:bg-white  text-white hover:text-black transition-all ease-in rounded-full md:mt-8 md:ml-4">Sign Up</button></a>
        </nav>
    </div>
</header>