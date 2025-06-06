
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpendWise | Home</title>
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine -->
    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Custom style -->
    <link rel="stylesheet" href="../public/style/landing.css" />
    <!-- Poppins font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased">
    <?php include "./partials/header.php" ;?>

    <div class="bg-cream">
        <div class="max-w-screen-xl px-8 mx-auto flex flex-col lg:flex-row">
            <!--Left Col-->
            <div class="flex flex-col w-full lg:w-6/12 justify-center lg:pt-24 items-start text-center lg:text-left mb-5 md:mb-0">
                <h1 data-aos="fade-right" data-aos-once="true" data-aos-duration="2000" data-aos-delay="100" class="my-4 text-5xl font-bold leading-tight text-darken">
                    <span class="text-yellow-500">SpendWise</span> The only app that gets your money into shape
                </h1>
                <p data-aos="fade-down" data-aos-once="true" data-aos-delay="300" class="leading-normal text-2xl mb-8">SpendWise is an interesting platform that will help you to manage your money</p>
                <div data-aos="fade-up" data-aos-once="true" data-aos-delay="700" class="w-full md:flex items-center justify-center lg:justify-start md:space-x-5">
                    <a href="./auth/login.php" style="z-index:50; position:relative"
                    class="cursor-pointer lg:mx-0 bg-yellow-500 text-white text-xl font-bold rounded-full py-4 px-9 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out">
                            Join for free
                    </a>
                    <div class="flex items-center justify-center space-x-3 mt-5 md:mt-0 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out">
                        <button class="bg-white w-14 h-14 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 ml-2" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5751 12.8097C23.2212 13.1983 23.2212 14.135 22.5751 14.5236L1.51538 27.1891C0.848878 27.5899 5.91205e-07 27.1099 6.25202e-07 26.3321L1.73245e-06 1.00123C1.76645e-06 0.223477 0.848877 -0.256572 1.51538 0.14427L22.5751 12.8097Z" fill="#23BDEE" />
                            </svg>
                        </button>
                        <span class="cursor-pointer">Watch how it works</span>
                    </div>
                </div>
            </div>
            <!--Right Col-->
            <div class="w-full lg:w-7/12 lg:relative lg:left-40 lg:top-16 lg:z-50">
                <img data-aos="fade-left" data-aos-once="true" data-aos-duration="2000"
                    class="w-[full]"
                    src="../public/img/bghero.png" />
            </div>
        </div> 
        <div class="text-white -mt-14 sm:-mt-24 lg:-mt-36 z-40 relative">
            <svg class="xl:h-72 xl:w-full" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" fill="currentColor"></path>
            </svg>
            <div class="bg-white w-full h-20 -mt-px"></div>
        </div>
    </div>

    <!-- container -->
    <div class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden">

        <!-- trusted by -->
        <div class="max-w-4xl mx-auto">
            <h1 class="text-center mb-3 text-gray-400 font-medium">Trusted by 5,000+ Companies Worldwide</h1>
            <div class="grid grid-cols-3 lg:grid-cols-6 gap-4 justify-items-center">
                <img class="h-7" src="../public/img/company/google.svg">
                <img class="h-7" src="../public/img/company/netflix.svg">
                <img class="h-7" src="../public/img/company/airbnb.svg">
                <img class="h-7 transform translate-y-2" src="../public/img/company/amazon.svg">
                <img class="h-7" src="../public/img/company/facebook.svg">
                <img class="h-7" src="../public/img/company/grab.svg">
            </div>
        </div>

        <!-- All-In-One Cloud Software. -->
        <div data-aos="flip-up" class="max-w-xl mx-auto text-center mt-24">
            <h1 class="font-bold text-darken my-3 text-2xl lg:text-5xl lg:my-6">All-In-One <span class="text-yellow-500">Cloud Software.</span></h1>
            <p class="leading-relaxed text-gray-500">SpendWise is one powerful online software suite that combines all the tools needed to Smarter financial decisions start .</p>
        </div>
        <!-- card -->
        <div class="grid md:grid-cols-3 gap-14 md:gap-5 mt-20">
            <div data-aos="fade-up" class="bg-white shadow-xl p-6 text-center rounded-xl">
                <div style="background: #5B72EE;" class="rounded-full w-16 h-16 flex items-center justify-center mx-auto shadow-lg transform -translate-y-12">
                    <svg class="w-6 h-6 text-white" viewBox="0 0 33 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24.75 23H8.25V28.75H24.75V23ZM32.3984 9.43359L23.9852 0.628906C23.5984 0.224609 23.0742 0 22.5242 0H22V11.5H33V10.952C33 10.3859 32.7852 9.83789 32.3984 9.43359ZM19.25 12.2188V0H2.0625C0.919531 0 0 0.961328 0 2.15625V43.8438C0 45.0387 0.919531 46 2.0625 46H30.9375C32.0805 46 33 45.0387 33 43.8438V14.375H21.3125C20.1781 14.375 19.25 13.4047 19.25 12.2188ZM5.5 6.46875C5.5 6.07164 5.80766 5.75 6.1875 5.75H13.0625C13.4423 5.75 13.75 6.07164 13.75 6.46875V7.90625C13.75 8.30336 13.4423 8.625 13.0625 8.625H6.1875C5.80766 8.625 5.5 8.30336 5.5 7.90625V6.46875ZM5.5 12.2188C5.5 11.8216 5.80766 11.5 6.1875 11.5H13.0625C13.4423 11.5 13.75 11.8216 13.75 12.2188V13.6562C13.75 14.0534 13.4423 14.375 13.0625 14.375H6.1875C5.80766 14.375 5.5 14.0534 5.5 13.6562V12.2188ZM27.5 39.5312C27.5 39.9284 27.1923 40.25 26.8125 40.25H19.9375C19.5577 40.25 19.25 39.9284 19.25 39.5312V38.0938C19.25 37.6966 19.5577 37.375 19.9375 37.375H26.8125C27.1923 37.375 27.5 37.6966 27.5 38.0938V39.5312ZM27.5 21.5625V30.1875C27.5 30.9817 26.8847 31.625 26.125 31.625H6.875C6.11531 31.625 5.5 30.9817 5.5 30.1875V21.5625C5.5 20.7683 6.11531 20.125 6.875 20.125H26.125C26.8847 20.125 27.5 20.7683 27.5 21.5625Z" fill="white" />
                    </svg>
                </div>
                <h1 class="font-medium text-xl mb-3 lg:px-14 text-darken">Have perfect control
                </h1>
                <p class="px-4 text-gray-500">over all your cash expenses, bank accounts, E-Wallets and crypto wallets.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="150" class="bg-white shadow-xl p-6 text-center rounded-xl">
                <div style="background: #F48C06;" class="rounded-full w-16 h-16 flex items-center justify-center mx-auto shadow-lg transform -translate-y-12">
                    <svg class="w-6 h-6 text-white" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0C11.0532 0 10.2857 0.767511 10.2857 1.71432V5.14285H13.7142V1.71432C13.7142 0.767511 12.9467 0 12 0Z" fill="#F5F5FC" />
                        <path d="M36 0C35.0532 0 34.2856 0.767511 34.2856 1.71432V5.14285H37.7142V1.71432C37.7143 0.767511 36.9468 0 36 0Z" fill="#F5F5FC" />
                        <path d="M42.8571 5.14282H37.7143V12C37.7143 12.9468 36.9468 13.7143 36 13.7143C35.0532 13.7143 34.2857 12.9468 34.2857 12V5.14282H13.7142V12C13.7142 12.9468 12.9467 13.7143 11.9999 13.7143C11.0531 13.7143 10.2856 12.9468 10.2856 12V5.14282H5.14285C2.30253 5.14282 0 7.44535 0 10.2857V42.8571C0 45.6974 2.30253 48 5.14285 48H42.8571C45.6975 48 48 45.6974 48 42.8571V10.2857C48 7.44535 45.6975 5.14282 42.8571 5.14282ZM44.5714 42.8571C44.5714 43.8039 43.8039 44.5714 42.857 44.5714H5.14285C4.19605 44.5714 3.42854 43.8039 3.42854 42.8571V20.5714H44.5714V42.8571Z" fill="#F5F5FC" />
                        <path d="M13.7142 23.9999H10.2857C9.33889 23.9999 8.57138 24.7674 8.57138 25.7142C8.57138 26.661 9.33889 27.4285 10.2857 27.4285H13.7142C14.661 27.4285 15.4285 26.661 15.4285 25.7142C15.4285 24.7674 14.661 23.9999 13.7142 23.9999Z" fill="#F5F5FC" />
                        <path d="M25.7143 23.9999H22.2857C21.3389 23.9999 20.5714 24.7674 20.5714 25.7142C20.5714 26.661 21.3389 27.4285 22.2857 27.4285H25.7143C26.6611 27.4285 27.4286 26.661 27.4286 25.7142C27.4286 24.7674 26.6611 23.9999 25.7143 23.9999Z" fill="#F5F5FC" />
                        <path d="M37.7143 23.9999H34.2857C33.3389 23.9999 32.5714 24.7674 32.5714 25.7142C32.5714 26.661 33.3389 27.4285 34.2857 27.4285H37.7143C38.6611 27.4285 39.4286 26.661 39.4286 25.7142C39.4286 24.7674 38.661 23.9999 37.7143 23.9999Z" fill="#F5F5FC" />
                        <path d="M13.7142 30.8571H10.2857C9.33889 30.8571 8.57138 31.6246 8.57138 32.5714C8.57138 33.5182 9.33889 34.2857 10.2857 34.2857H13.7142C14.661 34.2857 15.4285 33.5182 15.4285 32.5714C15.4285 31.6246 14.661 30.8571 13.7142 30.8571Z" fill="#F5F5FC" />
                        <path d="M25.7143 30.8571H22.2857C21.3389 30.8571 20.5714 31.6246 20.5714 32.5714C20.5714 33.5182 21.3389 34.2857 22.2857 34.2857H25.7143C26.6611 34.2857 27.4286 33.5182 27.4286 32.5714C27.4286 31.6246 26.6611 30.8571 25.7143 30.8571Z" fill="#F5F5FC" />
                        <path d="M37.7143 30.8571H34.2857C33.3389 30.8571 32.5714 31.6246 32.5714 32.5714C32.5714 33.5182 33.3389 34.2857 34.2857 34.2857H37.7143C38.6611 34.2857 39.4286 33.5182 39.4286 32.5714C39.4285 31.6246 38.661 30.8571 37.7143 30.8571Z" fill="#F5F5FC" />
                        <path d="M13.7142 37.7142H10.2857C9.33889 37.7142 8.57138 38.4817 8.57138 39.4286C8.57138 40.3754 9.33889 41.1428 10.2857 41.1428H13.7142C14.661 41.1428 15.4285 40.3753 15.4285 39.4284C15.4285 38.4816 14.661 37.7142 13.7142 37.7142Z" fill="#F5F5FC" />
                        <path d="M25.7143 37.7142H22.2857C21.3389 37.7142 20.5714 38.4817 20.5714 39.4285C20.5714 40.3754 21.3389 41.1429 22.2857 41.1429H25.7143C26.6611 41.1429 27.4286 40.3754 27.4286 39.4285C27.4286 38.4817 26.6611 37.7142 25.7143 37.7142Z" fill="#F5F5FC" />
                        <path d="M37.7143 37.7142H34.2857C33.3389 37.7142 32.5714 38.4817 32.5714 39.4285C32.5714 40.3754 33.3389 41.1429 34.2857 41.1429H37.7143C38.6611 41.1429 39.4286 40.3754 39.4286 39.4285C39.4286 38.4817 38.661 37.7142 37.7143 37.7142Z" fill="#F5F5FC" />
                    </svg>
                </div>
                <h1 class="font-medium text-xl mb-3 lg:px-14 text-darken">Get a quick overview
                </h1>
                <p class="px-4 text-gray-500">about your total incomes and expenses at a glance and in one place.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="300" class="bg-white shadow-xl p-6 text-center rounded-xl">
                <div style="background: #29B9E7;" class="rounded-full w-16 h-16 flex items-center justify-center mx-auto shadow-lg transform -translate-y-12">
                    <svg class="w-6 h-6 text-white" viewBox="0 0 55 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.25 19.25C11.2836 19.25 13.75 16.7836 13.75 13.75C13.75 10.7164 11.2836 8.25 8.25 8.25C5.21641 8.25 2.75 10.7164 2.75 13.75C2.75 16.7836 5.21641 19.25 8.25 19.25ZM46.75 19.25C49.7836 19.25 52.25 16.7836 52.25 13.75C52.25 10.7164 49.7836 8.25 46.75 8.25C43.7164 8.25 41.25 10.7164 41.25 13.75C41.25 16.7836 43.7164 19.25 46.75 19.25ZM49.5 22H44C42.4875 22 41.1211 22.6102 40.1242 23.5984C43.5875 25.4977 46.0453 28.9266 46.5781 33H52.25C53.7711 33 55 31.7711 55 30.25V27.5C55 24.4664 52.5336 22 49.5 22ZM27.5 22C32.8195 22 37.125 17.6945 37.125 12.375C37.125 7.05547 32.8195 2.75 27.5 2.75C22.1805 2.75 17.875 7.05547 17.875 12.375C17.875 17.6945 22.1805 22 27.5 22ZM34.1 24.75H33.3867C31.5992 25.6094 29.6141 26.125 27.5 26.125C25.3859 26.125 23.4094 25.6094 21.6133 24.75H20.9C15.4344 24.75 11 29.1844 11 34.65V37.125C11 39.4023 12.8477 41.25 15.125 41.25H39.875C42.1523 41.25 44 39.4023 44 37.125V34.65C44 29.1844 39.5656 24.75 34.1 24.75ZM14.8758 23.5984C13.8789 22.6102 12.5125 22 11 22H5.5C2.46641 22 0 24.4664 0 27.5V30.25C0 31.7711 1.22891 33 2.75 33H8.41328C8.95469 28.9266 11.4125 25.4977 14.8758 23.5984Z" fill="white" />
                    </svg>
                </div>
                <h1 class="font-medium text-xl mb-3 lg:px-14 text-darken lg:h-14 pt-3">Use our smart budgets                </h1>
                <p class="px-4 text-gray-500">to save money for a new car, dreamy vacation or top university.</p>
            </div>
        </div>

        <!-- lorem -->
        <div class="mt-28">
            <div data-aos="flip-down" class="text-center max-w-screen-md mx-auto">
                <h1 class="text-2xl my-3 lg:text-5xl  font-bold ">How to get your <br><span class="text-yellow-500">money into shape?</span></h1>
            </div>
        </div>

        <div class="sm:flex items-center sm:space-x-8 mt-36">
            <div data-aos="fade-right" class="sm:w-1/2 relative">
                <div class="bg-yellow-500 rounded-full absolute w-12 h-12 z-0 -left-4 -top-3 animate-pulse"></div>
                <h1 class="font-semibold text-2xl relative z-50 text-darken lg:pr-10">Track your cash flow</h1>
                <ul class="list-image-[url()] py-6 space-y-4">
                    <li  class="">Connect your bank accounts and all your transactions will get automatically imported to SpendWise.</li>
                    <li  class="">Connect your crypto wallet and E-Wallet for complete overview of your cash flow.</li>
                    <li  class="">Add your cash expenses manually.</li>
                </ul>
            </div>
            <div data-aos="fade-left" class="sm:w-1/2 relative mt-10 sm:mt-0">
                <div style="background: #23BDEE;" class="floating w-24 h-24 absolute rounded-lg z-0 -top-3 -left-3"></div>
                <img class="rounded-xl z-40 relative" src="../public/img/wallet.png" alt="">
                
                <div class="bg-yellow-500 w-20 h-20 floating absolute rounded-lg z-10 -bottom-3 -right-3"></div>
            </div>
        </div>

        <div class="md:flex mt-40 md:space-x-10 items-start">
            <div data-aos="fade-down" class="md:w-7/12 relative">
                <div style="background: #33EFA0" class="w-32 h-32 rounded-full absolute z-0 left-4 -top-12 animate-pulse"></div>
                <div style="background: #33D9EF;" class="w-5 h-5 rounded-full absolute z-0 left-36 -top-12 animate-ping"></div>
                <img class="relative z-50 floating" src="../public/img/vcall.png" alt="">
                <div style="background: #5B61EB;" class="w-36 h-36 rounded-full absolute z-0 right-16 -bottom-1 animate-pulse"></div>
                <div style="background: #F56666;" class="w-5 h-5 rounded-full absolute z-0 right-52 bottom-1 animate-ping"></div>
            </div>
            <div data-aos="fade-down" class="md:w-5/12 mt-20 md:mt-0 text-gray-500">
                <h1 class="text-2xl font-semibold text-darken lg:pr-40">Understand your financial habits</h1>
                <div class="flex items-center space-x-5 my-5">
                    <div class="flex-shrink bg-white shadow-lg rounded-full p-3 flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="11.8182" height="11.8182" rx="2" fill="#2F327D" />
                            <rect y="14.1816" width="11.8182" height="11.8182" rx="2" fill="#2F327D" />
                            <rect x="14.7727" width="11.8182" height="11.8182" rx="2" fill="#2F327D" />
                            <rect x="14.7727" y="14.1816" width="11.8182" height="11.8182" rx="2" fill="#F48C06" />
                        </svg>
                    </div>
                    <p>Teachers don’t get lost in the grid view and have a dedicated Podium space.</p>
                </div>
                <div class="flex items-center space-x-5 my-5">
                    <div class="flex-shrink bg-white shadow-lg rounded-full p-3 flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="6" width="20" height="20" rx="2" fill="#2F327D" />
                            <rect width="21.2245" height="21.2245" rx="2" fill="#F48C06" />
                        </svg>
                    </div>
                    <p>TA’s and presenters can be moved to the front of the class.</p>
                </div>
                <div class="flex items-center space-x-5 my-5">
                    <div class="flex-shrink bg-white shadow-lg rounded-full p-3 flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 11.375C6.15469 11.375 7.5 9.91758 7.5 8.125C7.5 6.33242 6.15469 4.875 4.5 4.875C2.84531 4.875 1.5 6.33242 1.5 8.125C1.5 9.91758 2.84531 11.375 4.5 11.375ZM25.5 11.375C27.1547 11.375 28.5 9.91758 28.5 8.125C28.5 6.33242 27.1547 4.875 25.5 4.875C23.8453 4.875 22.5 6.33242 22.5 8.125C22.5 9.91758 23.8453 11.375 25.5 11.375ZM27 13H24C23.175 13 22.4297 13.3605 21.8859 13.9445C23.775 15.0668 25.1156 17.093 25.4062 19.5H28.5C29.3297 19.5 30 18.7738 30 17.875V16.25C30 14.4574 28.6547 13 27 13ZM15 13C17.9016 13 20.25 10.4559 20.25 7.3125C20.25 4.16914 17.9016 1.625 15 1.625C12.0984 1.625 9.75 4.16914 9.75 7.3125C9.75 10.4559 12.0984 13 15 13ZM18.6 14.625H18.2109C17.2359 15.1328 16.1531 15.4375 15 15.4375C13.8469 15.4375 12.7688 15.1328 11.7891 14.625H11.4C8.41875 14.625 6 17.2453 6 20.475V21.9375C6 23.2832 7.00781 24.375 8.25 24.375H21.75C22.9922 24.375 24 23.2832 24 21.9375V20.475C24 17.2453 21.5812 14.625 18.6 14.625ZM8.11406 13.9445C7.57031 13.3605 6.825 13 6 13H3C1.34531 13 0 14.4574 0 16.25V17.875C0 18.7738 0.670312 19.5 1.5 19.5H4.58906C4.88438 17.093 6.225 15.0668 8.11406 13.9445Z" fill="#2F327D" />
                        </svg>
                    </div>
                    <p>Teachers can easily see all students and class data at one time.</p>
                </div>
            </div>
        </div>

      

        <!-- TESTIMONIAL -->
        <div class="mt-24 flex flex-col-reverse md:flex-row items-start md:space-x-10">
            <div data-aos="zoom-in-right" class="md:w-5/12">
                <div class="flex items-center space-x-20 mb-5">
                    <span class="border border-gray-300 w-14 absolute"></span>
                    <h1 class="text-gray-400 tracking-widest text-sm">TESTIMONIAL</h1>
                </div>
                <h1 class="font-semibold text-darken text-2xl lg:pr-40">What They Say?</h1>
                <p class="text-gray-500 my-5 lg:pr-36">SpendWise has got more than 100k positive ratings from our users around the world.</p>
                <p class="text-gray-500 my-5 lg:pr-36">Some of the students and teachers were greatly helped by the SpendWise.</p>
                <p class="text-gray-500 my-5 lg:pr-36">Are you too? Please give your assessment</p>
                <button class="flex items-center space-x-3 pl-3 border-b border-l border-t border-yellow-500 text-yellow-500 font-medium my-4 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out rounded-full">
                    <span>Write your assessment</span>
                    <div class="border border-yellow-500 h-14 w-14 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.7071 8.70711C26.0976 8.31658 26.0976 7.68342 25.7071 7.2929L19.3431 0.928934C18.9526 0.538409 18.3195 0.538409 17.9289 0.928934C17.5384 1.31946 17.5384 1.95262 17.9289 2.34315L23.5858 8L17.9289 13.6569C17.5384 14.0474 17.5384 14.6805 17.9289 15.0711C18.3195 15.4616 18.9526 15.4616 19.3431 15.0711L25.7071 8.70711ZM-8.74228e-08 9L25 9L25 7L8.74228e-08 7L-8.74228e-08 9Z" fill="#F48C06" />
                        </svg>
                    </div>
                </button>
            </div>
            <div data-aos="zoom-in-left" class="md:w-7/12">
                <img class="md:w-10/12 mx-auto" src="../public/img/testimonials.png">
            </div>
        </div>

        <!-- Latest News and Resources -->
        <div data-aos="zoom-in" class="mt-16 text-center">
            <h1 class="text-darken text-2xl font-semibold">Latest News and Resources</h1>
            <p class="text-gray-500 my-5">See the developments that have occurred to SpendWises in the world</p>
        </div>
        <div data-aos="zoom-in-up" class="my-14 flex flex-col lg:flex-row lg:space-x-20">
            <div class="lg:w-6/12">
                <img class="w-full mb-6" src="../public/img/laptop-news.png">
                <span class="bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full">NEWS</span>
                <h1 class="text-gray-800 font-semibold my-3 text-xl">Class adds $30 million to its balance sheet for a Zoom-friendly edtech solution</h1>
                <p class="text-gray-500 mb-3">Class, launched less than a year ago by Blackboard co-founder Michael Chasen, integrates exclusively...</p>
                <a href="" class="underline">Read more</a>
            </div>
            <div class="lg:w-7/12 flex flex-col justify-between mt-12 space-y-5 lg:space-y-0 lg:mt-0">
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="../public/img/children-laptop.png">
                            <span class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">PRESS RELEASE</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">Class Technologies Inc. Closes $30 Million Series A Financing to Meet High Demand</h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">Class Technologies Inc., the company that created Class,...</p>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="../public/img/girl-laptop.png">
                            <span class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">NEWS</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">Zoom’s earliest investors are betting millions on a better Zoom for schools</h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">Zoom was never created to be a consumer product. Nonetheless, the...</p>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-4/12">
                        <div class="relative">
                            <img class="rounded-xl w-full" src="../public/img/cat-laptop.png">
                            <span class="absolute bottom-2 right-2 bg-yellow-300 text-darken font-semibold px-4 py-px text-sm rounded-full hidden sm:block">NEWS</span>
                        </div>
                    </div>
                    <div class="w-8/12">
                        <h1 class="text-gray-800 text-sm sm:text-lg font-semibold">Former Blackboard CEO Raises $16M to Bring LMS Features to Zoom Classrooms</h1>
                        <p class="text-gray-500 my-2 sm:my-4 text-xs sm:text-md">This year, investors have reaped big financial returns from betting on Zoom...</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- .container -->
    <?php include "./partials/footer.php" ?>




    <!-- AOS init -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>