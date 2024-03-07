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
        <div class=" md:w-[80%] text-center py-4 px-8 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 h-full">
@foreach ($reservations as $reservation)
    

            <div class="mb-8 border border-gray-100 border-solid ">
                <div class=" w-full pb-4  rounded-md shadow-lg">
                    <div class=" ">
                        <div
                            class=" text-white text-xl font-semibold text-center duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E]">
                            <h1 class="">{{$reservation->event->title}}</h1>
                        </div>
                        <img src="{{ asset('storage/image/' . $reservation->event->image) }}" alt="" class="w-full max-h-48">
                    </div>

                    <div class="grid grid-cols-2 grid-rows-2 gap-4 mt-8 px-4 overflow-hidden">
                        <p class="inline-flex flex- text-sm  xl:flex-row xl:items-center text-gray-800">
                            <i class='bx bx-time-five'></i>
                            <span class="mt-2 xl:mt-0 ml-2">
                                {{ str_replace('T', ' ', $reservation->event->date) }} 
                            </span>
                        </p>
                        <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                            <i class='bx bx-purchase-tag-alt bx-rotate-90'></i>
                            <span class="mt-2 xl:mt-0 ml-2">{{$reservation->event->price}}
                                <i class='bx bx-dollar text-sm'></i>
                            </span>
                        </p>
                        <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                            <i class='bx bxs-user-circle'></i>
                            <span class="mt-2 xl:mt-0 ml-2">{{$reservation->client->user->first_name}} {{$reservation->client->user->last_name}}

                            </span>
                        </p>
                        <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                            <i class='bx bxl-gmail' style='color:#740303'></i>
                            <span class="mt-2 xl:mt-0 ml-2 text-[12px] font-semibold">
                                {{$reservation->client->user->email}}

                            </span>
                        </p>
                    </div>
                </div>

                <div class="flex ">

                    <form action="/AcceptReservation/{{$reservation->id}}/{{$reservation->event->id}}" method="post" class="w-full">
                        @csrf
                        <button type="submit"
                            class=" w-full  px-8 bg-green-800 hover:bg-green-400 text-white shadow-xl">Accept</button>
                    </form>
                    <form action="/DeclineReservation/{{$reservation->id}}" method="post" class="w-full">
                        @csrf
                        <button type="submit"
                            class=" w-full  px-8 bg-red-800 hover:bg-red-400 text-white shadow-xl">Cancel</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
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
