<div class="py-4 px-6  bg-gradient-to-r from-[#49566f] via-[#FBC2EB] to-[#49566f] flex items-center shadow-md shadow-black/5 sticky -top-0.5 left-0 z-30">
    <ul class="flex items-center text-sm ml-4">
        <li class="mr-2">
            <a href="/admin" class="text-[#FBC2EB] text-md hover:text-white font-semibold flex items-center gap-2"><img src="{{ asset('storage/image/' . 'logo.png') }}" alt="logo" class="w-20"> Admin</a>
        </li>
    </ul>
    <div class="md:absolute md:right-10 md:flex md:items-center max-md:ml-auto">

        <div class="mr-4 text-[#FBC2EB] font-semibold md:block hidden hover:text-white"><a href="/admin">Dashboard</a>
        </div>


        <div class=" inline-block w- border-gray-300 border-l-2 pl-6 cursor-pointer ">
            <button onclick="toggleModal('ProfilPop')"><svg xmlns="http://www.w3.org/2000/svg" height="24"
                    viewBox="0 -960 960 960" width="24">
                    <path class="outline-none"
                        d="M80-160v-160h160v160H80Zm240 0v-160h560v160H320ZM80-400v-160h160v160H80Zm240 0v-160h560v160H320ZM80-640v-160h160v160H80Zm240 0v-160h560v160H320Z" />
                </svg>
            </button>
            <div class="absolute z-50 w-[120px] hidden h-[85px] md:top-full rounded-md right-2 drop-shadow-2xl"
                id="ProfilPop">
                <a href='/managUsers'
                    class='hover:bg-[#49566f] rounded-t-md duration-300 hover:text-white w-full h-[50%] bg-white text-gray-600 font-bold text-[15px] flex items-center pl-4'>Users</a>
                <a href='/adminUsers'
                    class='md:hidden hover:bg-[#49566f] rounded-t-md duration-300 hover:text-white w-full h-[50%] bg-white text-gray-600 font-bold text-[15px] flex items-center pl-4'>DashBoard</a>
                <div class="h-[50%]"> <a href=""> <span
                            class="absolute md:mt-2.5   rounded-[0.37rem] bg-red-800 px-[0.45em] py-[0.2em] text-[0.6rem] leading-none text-white">1</span>
                    </a>
                    <a href='/eventsAccept'
                        class='hover:bg-[#49566f] rounded-t-md duration-300 hover:text-white w-full h-full bg-white text-gray-600 font-bold text-[15px] flex items-center pl-4'>Events</a>
                </div>
            
                <a href='/logout'
                    class='hover:bg-[#49566f] rounded-b-md duration-300 hover:text-white w-full h-[50%] bg-gray-300 text-gray-600 font-bold text-[15px] flex items-center pl-4'>log
                    out</a>
            </div>
        </div>
        <a href="/eventsAccept"> <span
                class="absolute md:-mt-2.5   rounded-[0.37rem] bg-red-800 px-[0.45em] py-[0.2em] text-[0.6rem] leading-none text-white">1</span>
        </a>


    </div>
</div>
