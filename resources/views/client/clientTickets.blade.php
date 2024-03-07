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
    <div class="container shadow-lg mx-auto bg-white mt-20 w-full md:mt-18">
        <!--Start Background Animation Body-->
        <div class=" bg-no-repeat w-full"
            style="background-image: url('https://wallpaperbat.com/img/161854-edm-festival-wallpaper.jpg');">

            <h1 class="py-8 font-black text-2xl md:text-4xl bg-white mix-blend-lighten uppercase text-center">
                My Tickets
            </h1>
        </div>
        <div class="grid grid-cols-3 gap-4 p-10">
            @foreach ($reservations as $reservation)
                <div class="w-full my-6">
                    <div class="w-20 h-5 text-center bg-red-500 text-sm text-white rounded-tl-lg">
                        <p>Cancel</p>
                    </div>
                    <div class="bg-white shadow-lg  rounded-br-lg overflow-hidden  grid grid-cols-[auto,1fr]">
                        <div class="bg-gray-100 px-5 py-2 grid items-end justify-center __col h-full bg-cover"
                            style='background-image: url("{{ asset('storage/image/' . $reservation->event->image) }}");'>
                            <form action="/ticket/{{ $reservation->id }}" method="POST"> @csrf <button
                                type="submit" class="text-white font-medium hover:text-purple-800">Get Ticket</button></form>
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $reservation->event->title }}</h2>
                            <div class="grid grid-cols-2 mb-2">
                                <p class="text-gray-600 flex items-center">
                                    <i class='bx bx-time-five mr-1'></i> {{ $reservation->event->date }}
                                </p>
                                <p class="text-gray-600 flex items-center">
                                    <i class='bx bx-purchase-tag-alt bx-rotate-90 mr-1 mt-1'></i>
                                    {{ $reservation->event->price }}<i class='bx bx-dollar text-sm'></i>
                                </p>

                            </div>
                            <p class="text-sm">Reservation Accepted You Can Have Your Ticket Now</p>

                        </div>
                    </div>
                </div>
            @endforeach







        </div>
    </div>
</body>

</html>
