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

<body >
    @include('layouts/clientNav')

    <!--Container-->
    <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18 px-4 pt-6" >
        <div class=" my-4 w-full ">

            <div class="flex flex-col">
                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg">
                   <div class="w-full text-center font-bold text-2xl "><h1 class="bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] inline-block text-transparent bg-clip-text">Found Your Desire</h1></div> 
                    <form class="" action="/client" method="GET">
                      

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div class="relative  w-full flex  items-end justify-between rounded-md">
                                <svg class="absolute left-2 md:top-[55%] top-1/3 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8" class=""></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                                </svg>
                                <input type="name" name="filterTitle"
                                    class="h-10 w-full cursor-text rounded-md border border-gray-100 bg-gray-100 py-4  pl-12 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    placeholder="Search by Title" />
                            </div>

                            <div class="flex flex-col">
                                <label for="manufacturer" class="text-sm font-medium text-stone-600">categories</label>

                                <select id="manufacturer" name="filterCategorie"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="{{ null }}">None</option>
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="flex flex-col">
                                <label for="status" class="text-sm font-medium text-stone-600">Status</label>

                                <select id="status" name="filterPrice"
                                    class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="{{null}}">None</option>
                                    <option value="100/500">100 $ - 500 $</option>
                                    <option value="500/1000">500 $ - 1000 $</option>
                                    <option value="1000/1500">1000 $ - 1500 $</option>
                                    <option value="1500/2000">1500 $ - 2000 $</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                            <a href="/client"
                                class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Reset</a>
                            <button type="submit"
                                class="rounded-lg bg-black px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Search</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        @if (session('success'))
            <div id="success-message"
                class="bg-green-600 rounded-md  fixed right-20  top-40 z-50 text-white px-4 py-2 text-center animate-pulse mb-4">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000);
            </script>
        @endif
        @if (session('error'))
            <div id="error-message"
                class="bg-red-600 rounded-md  fixed right-20  top-40 z-50 text-white px-4 py-2 text-center animate-pulse mb-4">
                {{ session('error') }}
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('error-message').style.display = 'none';
                }, 5000);
            </script>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mb-4 w-full py-8 px-1">
            @foreach ($events as $event)
                <div class="relative mx-auto w-full">
                    <a href="#"
                        class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
                        <div class="shadow p-4 rounded-lg bg-white">
                            <div class="flex  justify-center relative rounded-lg overflow-hidden h-52">
                                <img src="{{ asset('storage/image/' . $event->image) }}" alt="" class="w-full">
                                <div
                                    class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full">
                                    <div class="absolute inset-0 bg-black opacity-10"></div>
                                </div>

                                <div class="absolute flex justify-center bottom-0 mb-3">
                                    <div class="flex bg-white px-4 py-1 space-x-5 rounded-lg overflow-hidden shadow">
                                        <p class="flex items-center font-medium text-gray-800">
                                            <i class='bx bx-chair'></i>
                                            {{ $event->sets }}
                                        </p>


                                    </div>
                                </div>

                                @if ($event->setsLeft > 0)
                                    <span
                                        class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-green-600 text-sm font-medium text-white select-none">

                                        Available
                                    </span>
                                @else
                                    <span
                                        class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-red-600 text-sm font-medium text-white select-none">

                                        Out Of Stock
                                    </span>
                                @endif
                            </div>

                            <div class="mt-4">
                                <h2 class="font-medium text-base md:text-lg text-gray-800 line-clamp-1"
                                    title="New York">
                                    {{ $event->title }}
                                </h2>
                                <p class="mt-2 text-sm text-gray-800 line-clamp-1"
                                    title="New York, NY 10004, United States">
                                    <i class='bx bx-map'></i>

                                    <span class="mt-2 xl:mt-0 ml-2">
                                        {{ $event->location }}
                                    </span>
                                </p>
                            </div>

                            <div class="grid grid-cols-2 grid-rows-2 gap-4 mt-8">
                                <p class="inline-flex flex-col  xl:flex-row xl:items-center text-gray-800">
                                    <i class='bx bx-time-five'></i>
                                    <span class="mt-2 xl:mt-0 ml-2 text-sm">
                                        {{ str_replace('T', ' ', $event->date) }}
                                    </span>
                                </p>
                                <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                    <i class='bx bx-category-alt'></i>
                                    <span class="mt-2 xl:mt-0 ml-2">
                                        {{ $event->categorie->title }}

                                    </span>
                                </p>
                                <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                    <i class='bx bx-purchase-tag-alt bx-rotate-90'></i>
                                    <span class="mt-2 xl:mt-0 ml-2">
                                        {{ $event->price }}
                                        <i class='bx bx-dollar text-sm'></i>
                                    </span>
                                </p>
                                <p
                                    class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">

                                    {{ $event->acceptation }}

                                </p>
                            </div>

                            <div class="grid grid-cols- mt-8">
                                <form action="/reserve/{{ $event->id }}" method="POST">
                                    @csrf

                                    <div class="flex justify-end">

                                        <div class="relative inline-flex  group h-12">
                                            <div
                                                class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt">
                                            </div>
                                            <button type="submit" title="Get quote now"
                                                onclick="return confirm('Do You want to Reserve the Ticket of this event costing {{ $event->price }}$ ?')"
                                                class="relative inline-flex items-center justify-center px-6 py-4 text-sm font-semibold text-white transition-all duration-200 bg-gray-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                                role="button">Get a set now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>


    <script>
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>

</body>

</html>
