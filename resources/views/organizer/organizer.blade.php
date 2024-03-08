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
    @include('layouts/organizerNav')

    <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18 ">

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
        <div class="flex flex-col justify-center items-center">
            <div class=" bg-no-repeat w-full"
                style="background-image: url('https://wallpaperbat.com/img/161854-edm-festival-wallpaper.jpg');">

                <h1 class="py-8 font-black text-2xl md:text-4xl bg-white mix-blend-lighten uppercase text-center">
                    My Events
                </h1>
            </div>
        </div>
        <div class="w-[85%] mx-auto flex justify-end ">

            <div class="relative inline-flex mt-4 md:mb-0 mb-2  group h-9 md:h-12"
                onclick="toggleModal('newEventModal')">
                <div
                    class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt">
                </div>
                <button type="button" title="Get quote now"
                    class="relative flex gap-4 items-center animate-bounce  justify-center px-2 md:px-6 py-1 md:py-4 md:text-sm text-[10px] font-semibold text-white transition-all duration-200 bg-gray-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                    role="button"> New Event <i class='bx bx-plus' style='color:#ffffff'></i>

                </button>
            </div>
        </div>
        @if ($events->count() > 0)
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mb-4 w-full md:px-12 px-4 pb-14">
                @foreach ($events as $event)
                    <div class="relative mx-auto w-full">
                        <a href="#"
                            class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
                            <div class="shadow p-4 rounded-t-lg bg-white">
                                <div class="flex  justify-center relative rounded-lg overflow-hidden h-52">
                                    <img src="{{ asset('storage/image/' . $event->image) }}" alt="">
                                    <div
                                        class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full">
                                        <div class="absolute inset-0 bg-black opacity-10"></div>
                                    </div>

                                    <div class="absolute flex justify-center bottom-0 mb-3">
                                        <div
                                            class="flex bg-white px-4 py-1 space-x-5 rounded-lg overflow-hidden shadow">
                                            <p class="flex items-center font-medium text-gray-800">
                                                <i class='bx bx-chair'></i>
                                                {{ $event->setsLeft }} left
                                            </p>


                                        </div>
                                    </div>
                                    @if ((int) $event->status === 0)
                                        <span
                                            class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-orange-600 text-sm font-medium text-white select-none">
                                            Waiting
                                        </span>
                                    @elseif((int) $event->status === 1)
                                        <span
                                            class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-green-600 text-sm font-medium text-white select-none">
                                            Accepted
                                        </span>
                                    @else
                                        <span
                                            class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-red-600 text-sm font-medium text-white select-none">
                                            Declined
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
                                        <span class="mt-2 xl:mt-0 ml-2">
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
                                            {{ $event->price }}<i class='bx bx-dollar text-sm'></i>
                                        </span>
                                    </p>
                                    <p
                                        class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">

                                        {{ $event->acceptation }}
                                    </p>
                                </div>


                            </div>
                            @if ((int) $event->status === 0)
                                <div class="flex rounded-b-lg">

                                    <form action="/EditEvents" method="post" class="w-full rounded-b-lg">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <button type="submit"
                                            class=" w-full rounded-bl-lg  px-8 bg-gray-600 hover:bg-gray-800 text-white shadow-xl">Update</button>
                                    </form>
                                    <form action="/DeleteEvents/{{ $event->id }}" method="post" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class=" w-full rounded-br-lg  px-8 bg-black hover:bg-black/80 text-white shadow-xl">delete</button>
                                    </form>
                                </div>
                            @endif
                        </a>
                    </div>
                @endforeach

            </div>
        @else
            <div class="w-full text-2xl font-semibold pb-8 text-center">
                <h1>No Event Found</h1>
            </div>
        @endif
    </div>



    {{-- ---------------------------- Add Event Pop-Up--------------------------------- --}}

    <div id="newEventModal" class=" fixed  hidden   z-50 top-0 left-0 right-0 bottom-0   bg-black/30">
        <div class="h-screen flex items-center py-8">
            <div class="mx-auto   px-9 py-8 w-full max-w-[550px] rounded-md bg-white">
                <div class="text-right text-4xl"> <button type="button" onclick="toggleModal('newEventModal')"><i
                            class='bx bx-x-circle'></i></a></div>

                <div class="text-red-500 text-[20px] w-full text-center">
                    @if ($errors->any())
                        <script>
                            document.getElementById('newEventModal').classList.remove('hidden')
                        </script>
                        <div>{{ $errors->first() }}</div>
                    @endif
                </div>
                @if ($eventData !== null)
                    <script>
                        document.getElementById('newEventModal').classList.remove('hidden')
                    </script>
                    <form action="/updateEvent/{{ $eventData->id }}" method="POST" id="booking"
                        enctype="multipart/form-data">
                    @else
                        <form action="/createEvent" method="POST" id="booking" enctype="multipart/form-data">
                @endif

                @csrf

                <div class="mb-3">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Title :
                    </label>
                    <input type="text" name="title" value="{{ $eventData ? $eventData->title : '' }}"
                        id="name" placeholder="Enter Event Title Here ..."
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div class="mb-3">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Location :
                    </label>
                    <input type="text" name="location" value="{{ $eventData ? $eventData->location : '' }}"
                        id="name" placeholder="Enter Event Adress Here ..."
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class=" w-full grid grid-cols-2">

                    <div class="w-full">

                        <div class="w-full pr-3 ">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                Price :
                            </label>
                            <div class="mb-3">

                                <input type="number" name="price"
                                    value="{{ $eventData ? $eventData->price : '' }}" id="price"
                                    placeholder="Chair Price"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>

                        </div>
                    </div>
                    <div class="w-full ">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Categories :
                        </label>
                        <div class="mb-3">
                            <select type="text" name="categorie_id" id="Categorie"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <option selected>select Categorie</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div class=" w-full grid grid-cols-2 ">

                    <div class="w-full pr-4">
                        <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                            Event Date :
                        </label>
                        <input name="date" type="datetime-local" value="{{ $eventData ? $eventData->date : '' }}"
                            min="{{ now()->timezone('Africa/Casablanca')->format('Y-m-d\TH:i') }}"
                            max="{{ now()->timezone('Africa/Casablanca')->addMonth()->format('Y-m-d\TH:i') }}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Reservation Type :
                        </label>
                        <select type="text" name="acceptation" id="acceptation"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="{{ $eventData ? $eventData->acceptation : '' }}">
                                {{ $eventData ? $eventData->acceptation : '' }}</option>
                            @if ($eventData == null)
                                <option selected disabled>select Type</option>
                                <option value="automatically">automatically</option>
                                <option value="manually">manually</option>
                            @endif

                        </select>
                    </div>
                </div>
                <div class=" w-full grid grid-cols-2 ">

                    <div class=" pr-2 ">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Event Image :
                        </label>
                        <input type="file" name="image" value="{{ $eventData ? $eventData->image : '' }}"
                            class="w-full text-black text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-1 file:mr-4 file:bg-gray-900 duration-300 file:hover:bg-[#FBC2EB] file:text-white rounded" />
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Sets :
                        </label>
                        <input type="number" name="sets" id="price" placeholder="Sets Number ..."
                            value="{{ $eventData ? $eventData->sets : '' }}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="mb-7">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Description :
                    </label>
                    <textarea type="text" name="description" id="name" placeholder="Enter Event Description Here ..."
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $eventData ? $eventData->description : '' }}</textarea>
                </div>

                <div class="relative inline-flex w-full group h-12">
                    <div
                        class="absolute w-full transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-md group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt">
                    </div>
                    <button type="submit" title="Get quote now"
                        class="relative w-full flex gap-4 items-center justify-center px-6 py-4 text-sm font-semibold text-white transition-all duration-200 bg-gray-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                        role="button"> New Event <i class='bx bx-plus' style='color:#ffffff'></i>

                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ---------------------------- Add Event Pop-Up--------------------------------- --}}

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>
</body>

</html>
