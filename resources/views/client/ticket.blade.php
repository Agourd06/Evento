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

<body class="">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .barcode {
            left: 50%;
            box-shadow: 1px 0 0 1px, 5px 0 0 1px, 10px 0 0 1px, 11px 0 0 1px, 15px 0 0 1px, 18px 0 0 1px, 22px 0 0 1px, 23px 0 0 1px, 26px 0 0 1px, 30px 0 0 1px, 35px 0 0 1px, 37px 0 0 1px, 41px 0 0 1px, 44px 0 0 1px, 47px 0 0 1px, 51px 0 0 1px, 56px 0 0 1px, 59px 0 0 1px, 64px 0 0 1px, 68px 0 0 1px, 72px 0 0 1px, 74px 0 0 1px, 77px 0 0 1px, 81px 0 0 1px, 85px 0 0 1px, 88px 0 0 1px, 92px 0 0 1px, 95px 0 0 1px, 96px 0 0 1px, 97px 0 0 1px, 101px 0 0 1px, 105px 0 0 1px, 109px 0 0 1px, 110px 0 0 1px, 113px 0 0 1px, 116px 0 0 1px, 120px 0 0 1px, 123px 0 0 1px, 127px 0 0 1px, 130px 0 0 1px, 131px 0 0 1px, 134px 0 0 1px, 135px 0 0 1px, 138px 0 0 1px, 141px 0 0 1px, 144px 0 0 1px, 147px 0 0 1px, 148px 0 0 1px, 151px 0 0 1px, 155px 0 0 1px, 158px 0 0 1px, 162px 0 0 1px, 165px 0 0 1px, 168px 0 0 1px, 173px 0 0 1px, 176px 0 0 1px, 177px 0 0 1px, 180px 0 0 1px;
            display: inline-block;
            transform: translateX(-90px);
        }
    </style>
    <div class="flex flex-col items-center justify-center min-h-screen bg-center bg-cover bg-no-repeat"
        style="background-image: url(https://i.pinimg.com/564x/c0/57/04/c057042465f61b243234b49eec15efb7.jpg);background: cover;">
        <div class="absolute bg-blue-900/20 opacity-80 inset-0 z-0"></div>
     <div class="w-full pl-10"> <a href="/client"> <div class="  h-12 w-12 text-center rounded-full bg-white animate-pulse"><i class='bx bx-arrow-back text-5xl' style='color:#151414'  ></i></div></a></div> 

        <div class="max-w-md w-full h-full mx-auto z-10 bg-blue-900 rounded-3xl">
            
            <div class="flex flex-col">
                <div class="bg-white relative drop-shadow-2xl  rounded-3xl p-4 m-4">
                    <div class="flex-none sm:flex">
                        <div class=" relative h-32 w-32   sm:mb-0 mb-3 hidden">
                            <img src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                                alt="aji" class=" w-32 h-32 object-cover rounded-2xl">
                            <a href="#"
                                class="absolute -right-2 bottom-2   -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="h-4 w-4">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="flex-auto justify-evenly">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center  my-1">
                                    <span class="mr-3 rounded-full bg-white w-12 h-8">
                                        <img src="{{ asset('storage/image/' . 'logo.png') }}"
                                            class="h-8  p-1">
                                    </span>
                                    <h2 class="font-medium">Evento</h2>
                                </div>
                                <div class="ml-auto text-blue-800">{{time()}}</div>
                            </div>
                            <div class="border-b border-dashed border-b-2 my-5"></div>
                            <div class="flex items-center">
                               
                                <div class="flex flex-col mx-auto">
                                    <img src="{{ asset('storage/image/' . 'logo.png') }}"
                                        class="w-20 p-1">

                                </div>
                              
                            </div>
                            <div class="border-b border-dashed border-b-2 my-5 pt-5">
                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                            </div>
                            <div class="flex items-center mb-5 p-5 text-sm">
                                <div class="flex flex-col">
                                    <span class="text-sm">Event</span>
                                    <div class="font-semibold">{{$reservation->event->categorie->title}}</div>

                                </div>
                                <div class="flex flex-col ml-auto">
                                    <span class="text-sm">Title</span>
                                    <div class="font-semibold">{{$reservation->event->title}}</div>

                                </div>
                            </div>
                            <div class="flex items-center justify-between mb-5 pl-5 pr-10 py-5 text-sm">
                                <div class="flex flex-col text-sm">
                                    <span class="">Date</span>
                                    <div class="font-semibold">{{$reservation->event->date}}</div>

                                </div>
                                <div class="flex flex-col text-sm ">
                                    <span class="">Price</span>
                                    <div class="font-semibold">{{$reservation->event->price}} $</div>

                                </div>
                                
                            </div>
                            <div class="border-b border-dashed border-b-2 my-5 pt-5">
                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                            </div>
                            <div class="flex items-center px-5 pt-3 text-sm">
                                <div class="flex flex-col">
                                    <span class="">Client</span>
                                    <div class="font-semibold">{{$reservation->client->user->first_name}} {{$reservation->client->user->last_name}}</div>

                                </div>
                                <div class="flex flex-col mx-auto">
                                    <span class="">Location</span>
                                    <div class="font-semibold">{{$reservation->event->location}}$</div>

                                </div>
                               
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

</body>

</html>
