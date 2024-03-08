<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>BricoleMe</title>
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#clientTable').DataTable();
        });
        $(document).ready(function() {
            $('#organizerTable').DataTable();
        });
    </script>


</head>




<body class="text-gray-800 font-inter">
    <section class="w-full   bg-gray-50 min-h-screen transition-all main">
        @include('layouts/adminNav')

        <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">
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
            <h2 class="text-gray-500 text-lg font-semibold pb-4">organizer</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
            <div class="overflow-x-auto">
                <table id="organizerTable" class="min-w-full bg-white font-[sans-serif]">
                    <thead class="bg-gradient-to-r from-[#000000] to-[#4a0d3f] whitespace-nowrap">
                        <tr>

                            <th
                                class="px-6 py-3 text-left max-w-4  md:text-[15px] text-[12px] font-semibold text-white">
                                Profile
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                FullName
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Phone
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                E-mail
                            </th>

                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Bana
                            </th>

                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        
                        @foreach ($organizers as $organizer)
                            <tr class="even:bg-blue-50">
                                <td class="md:text-[15px] max-w-1  text-[12px]">
                                    <img class="w-full" src="{{ asset('storage/image/' . $organizer->user->profile) }}"
                                        alt="">

                                </td>
                                <td class="pl-10 py-4 md:text-[15px] text-[12px]">
                                    {{ $organizer->user->first_name }} {{ $organizer->user->last_name }}

                                </td>
                                <td class="pl-4 py-4 md:text-[15px] text-[12px]">
                                    {{ $organizer->user->phone }}
                                </td>


                                <td class="  md:text-[15px] text-left pl-8 text-[12px] ">
                                    {{ $organizer->user->email }}
                                </td>


                                <td class="pl-4 pt-8 flex">
                                    @if ( $organizer->deleted_at == null)
                                        <form action="/archiveUser/{{ $organizer->user->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="role" value="organizer">
                                            <button type="submit" class="mr-4" title="archive" name="archive" value="">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red"
                                                    viewBox="0 -960 960 960" width="24">
                                                    <path
                                                        d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                </svg>
                                            </button>


                                        </form>
                                     
                                    @else
                                       <p class="text-md font-bold text-red-800">BANNED</p>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

            <h2 class="text-gray-500 text-lg font-semibold pb-4">Clients</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
            <div class="overflow-x-auto">
                <table id="clientTable" class="min-w-full bg-white font-[sans-serif]">
                    <thead class="bg-gradient-to-r from-[#000000] to-[#4a0d3f] whitespace-nowrap">
                        <tr>

                            <th
                                class="px-6 py-3 text-left max-w-4  md:text-[15px] text-[12px] font-semibold text-white">
                                Profile
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                FullName
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Phone
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                E-mail
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Ban
                            </th>

                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach ($clients as $client)
                            <tr class="even:bg-blue-50">
                                <td class="md:text-[15px] max-w-1  text-[12px]">
                                    <img class="w-full" src="{{ asset('storage/image/' . $client->user->profile) }}"
                                        alt="">

                                </td>
                                <td class="pl-10 py-4 md:text-[15px] text-[12px]">
                                    {{ $client->user->first_name }} {{ $client->user->last_name }}

                                </td>
                                <td class="pl-4 py-4 md:text-[15px] text-[12px]">
                                    {{ $client->user->phone }} </td>


                                <td class="  md:text-[15px] text-left pl-8 text-[12px] ">
                                    {{ $client->user->email }}
                                </td>

                                <td class="pl-4 pt-8 flex">
                                    @if ( $client->deleted_at == null)
                                        <form action="/archiveUser/{{ $client->user->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="role" value="client">
                                            <button type="submit" class="mr-4" title="archive" name="archive" value="">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red"
                                                    viewBox="0 -960 960 960" width="24">
                                                    <path
                                                        d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                </svg>
                                            </button>


                                        </form>
                                     
                                    @else
                                       <p class="text-md font-bold text-red-800">BANNED</p>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

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
