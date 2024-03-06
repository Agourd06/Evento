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

<body class="text-gray-800 font-inter">
    <section class="w-full   bg-gray-50 min-h-screen transition-all main">
        @include('layouts/adminNav')
        <div class="flex">
            <div
                class="w-[35%] min-h-screen bg-gradient-to-r from-[#49566f] to-[#fbc2ebad]  text-white flex flex-col justify-center pb-10 px-4">
                <h1 class="text-center text-2xl font-bold mb-10">Dear Administrator :</h1>

                <p class="text-center text-lg font-semibold mb-10">
                    Your attention is required! We value a fair and safe
                    environment for all users. Please take a moment to visit the Events Review Center to assess and
                    address
                    Events Acceptations.
                </p>
                <h3 class="text-center text-xl font-bold">Your Decision Matters</h3>
            </div>
            {{-- @if ($reclamations->count() > 0) --}}
            <div class=" w-[80%] text-center py-4 px-8 grid grid-cols-3 gap-4 h-full">
                @if (session('success'))
                    <div id="success-message"
                        class="bg-green-600 rounded-md  fixed right-20  top-50 z-50 text-white p-4 text-center animate-bounce mb-4">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            document.getElementById('success-message').style.display = 'none';
                        }, 5000);
                    </script>
                @endif
                {{-- @foreach ($reclamations as $reclamation) --}}
                <div class="mb-8 border border-gray-100 border-solid ">
                    <div class=" w-full py-4  rounded-md shadow-lg">
                        <div class=" ">
                            <div class="text-left font-semibold text-center">
                                <h1>Title : Administrator,</h1>
                            </div>
                            <img src="https://c0.wallpaperflare.com/preview/285/1009/176/concery-wallpaper-festival-party.jpg"
                                alt="" class="w-full">
                        </div>

                        <div class="grid grid-cols-2 grid-rows-2 gap-4 mt-8 px-4">
                            <p class="inline-flex flex-col  xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-time-five'></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                    2000-06-18
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-category-alt'></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                    marriage
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-purchase-tag-alt bx-rotate-90'></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                    200<i class='bx bx-dollar text-sm'></i>
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-chair'></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                    200

                                </span>
                            </p>
                        </div>
                    </div>
                    <form action="/deletRepport" method="post" class="flex">
                        @csrf
                        <input type="hidden" name="repport_id" value="">
                        <button type="submit"
                            class=" w-full  px-8 bg-green-800 hover:bg-green-400 text-white shadow-xl">Accept</button>
                        <button type="submit"
                            class=" w-full  px-8 bg-red-800 hover:bg-red-400 text-white shadow-xl">Cancel</button>
                    </form>

                </div>
                {{-- @endforeach --}}

            </div>
            {{-- @else --}}
            {{-- <div class="w-full text-xl font-semibold text-center mt-10">
                <p>No Reclamation Found</p>
            </div> --}}
            {{-- @endif --}}
        </div>

    </section>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        document.getElementById('addMedicamentButton').addEventListener('click', () => toggleModal('addCompetenceModal'));
        document.getElementById('closeJobModalButton').addEventListener('click', () => toggleModal(
            'addCompetenceModal'));
        document.getElementById('addJobButton').addEventListener('click', () => toggleModal('addJobModal'));
        document.getElementById('CloseJobButton').addEventListener('click', () => toggleModal('addJobModal'));
    </script>
</body>

</html>
