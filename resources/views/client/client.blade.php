<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @vite('resources/css/app.css')

    <title>Document</title>
</head>

<body>
    <nav class="flex items-center justify-between flex-wrap bg-gray-800 p-6 fixed w-full z-10 top-0">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                <img src="{{ asset('storage/image/' . 'logo.png') }}" alt="logo" class="w-20 max-h-16">
            </a>
        </div>

        <div class="block lg:hidden">
            <button id="nav-toggle"
                class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>

        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white no-underline" href="#">Active</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                        href="#">link</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                        href="#">link</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                        href="#">link</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Container-->
    <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mb-4 w-full p-12">
            <div class="relative mx-auto w-full">
                <a href="#"
                    class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
                    <div class="shadow p-4 rounded-lg bg-white">
                        <div class="flex  justify-center relative rounded-lg overflow-hidden h-52">
                            <img src="https://c0.wallpaperflare.com/preview/285/1009/176/concery-wallpaper-festival-party.jpg" alt="" class="w-full">
                            <div class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full">
                                <div class="absolute inset-0 bg-black opacity-10"></div>
                            </div>

                            <div class="absolute flex justify-center bottom-0 mb-3">
                                <div class="flex bg-white px-4 py-1 space-x-5 rounded-lg overflow-hidden shadow">
                                    <p class="flex items-center font-medium text-gray-800">
                                        <i class='bx bx-chair'></i>
                                        150
                                    </p>


                                </div>
                            </div>

                            <span
                                class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-green-600 text-sm font-medium text-white select-none">
                                Available
                            </span>
                        </div>

                        <div class="mt-4">
                            <h2 class="font-medium text-base md:text-lg text-gray-800 line-clamp-1" title="New York">
                                Statue of Liberty
                            </h2>
                            <p class="mt-2 text-sm text-gray-800 line-clamp-1"
                                title="New York, NY 10004, United States">
                                <i class='bx bx-map'></i>
                                
                                <span class="mt-2 xl:mt-0 ml-2">
                                    New York, NY 10004, United States
                               </span>
                            </p>
                        </div>

                        <div class="grid grid-cols-2 grid-rows-2 gap-4 mt-8">
                            <p class="inline-flex flex-col  xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-time-five'></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                     2000-06-18
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-category-alt' ></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                    marriage
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-purchase-tag-alt bx-rotate-90' ></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                   200<i class='bx bx-dollar text-sm' ></i>
                                </span>
                            </p>
                            <p
                                    class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">
                                   
                                    Auto
                                </p>
                        </div>

                        <div class="grid grid-cols-2 mt-8">
                            <div class="flex items-center">
                                <div class="relative">
                                    <div class="rounded-full w-6 h-6 md:w-8 md:h-8 bg-gray-200"></div>
                                    <span
                                        class="absolute top-0 right-0 inline-block w-3 h-3 bg-primary-red rounded-full"></span>
                                </div>

                                <p class="ml-2 text-gray-800 line-clamp-1">
                                    John Doe
                                </p>
                            </div>

                            <div class="flex justify-end">
                                {{-- <div class=" bg-black flex justify-center items-center"> --}}

                                    <div class="relative inline-flex  group h-12">
                                        <div
                                            class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt">
                                        </div>
                                        <button type="button" title="Get quote now"
                                            class="relative inline-flex items-center justify-center px-6 py-4 text-sm font-semibold text-white transition-all duration-200 bg-gray-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                            role="button">Get a set now
                                        </button>
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </div>


    <script>
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>

</body>

</html>
