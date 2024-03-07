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
   @include('layouts/clientNav')

    <!--Container-->
    <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mb-4 w-full p-12">
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
                                            <button type="submit" title="Get quote now" onclick="return confirm('Do You want to Reserve the Ticket of this event costing {{$event->price}}$ ?')"
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
