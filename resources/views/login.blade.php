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


    <div class="font-[sans-serif] bg-gradient-to-r from-[#350d36] via-purple-800 to-purple-600 text-[#333]">
        <div class="min-h-screen flex fle-col items-center justify-center lg:p-6 p-4">
            @if (session('error'))
                <div id="error-message"
                    class="fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition flex items-center">
                    <!-- overlay -->

                    <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer">
                    </div>
                    
                    <!-- Modal -->
                    <div class="relative w-full cursor-pointer pointer-events-none transition my-auto p-4">
                        
                        <div
                            class="w-full py-2 bg-white cursor-default pointer-events-auto dark:bg-gray-800 relative rounded-xl mx-auto max-w-sm">
                            <div class="w-full flex justify-center"><i class='bx bxs-info-circle text-4xl'
                                style='color:#d13b3b'></i></div>
                            <div class="space-y-2 p-2">
                                <div class="p-4 space-y-2 text-center dark:text-white">


                                    <p class="text-gray-500">
                                        Sorry To Inform You That Your Account has been suspended
                                    </p>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <div aria-hidden="true" class="border-t dark:border-gray-700 px-2"></div>
                            </div>


                        </div>
                    </div>
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('error-message').style.display = 'none';
                    }, 5000);
                </script>
            @endif
            <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
                <div class="max-md:text-center">
                    <a href="javascript:void(0)"><img src="{{ asset('storage/image/' . 'logo.png') }}" alt="logo"
                            class='w-52 mb-10 inline-block' />
                    </a>
                    <h2 class="text-4xl font-extrabold lg:leading-[50px] text-white">
                        Seamless Entry for Exclusive Event Access
                    </h2>
                    <p class="text-sm mt-6 text-white">Embark on a refined and effortless login journey through our
                        meticulously crafted entry point. Experience the charm of seamlessly accessing your event
                        account on our platform, where sophistication meets simplicity.</p>

                </div>
                <form action="/login" method="POST"
                    class="bg-white rounded-xl px-6 py-8 space-y-6 max-w-md md:ml-auto max-md:mx-auto w-full">
                    <h3 class="text-3xl font-extrabold mb-12 max-md:text-center">
                        Sign in
                    </h3>
                    @csrf
                    <div class="text-red-500 text-[20px] w-full text-center">
                        @if ($errors->any())
                            <div>{{ $errors->first() }}</div>
                        @endif
                    </div>
                    <div>
                        <input name="email" type="email" autocomplete="email" required
                            class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-[#333]"
                            placeholder="Email address" />
                    </div>
                    <div>
                        <input name="password" type="password" autocomplete="current-password" required
                            class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-[#333]"
                            placeholder="Password" />
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <input id="remember-me" name="rememberMe" type="checkbox" value="{{ true }}"
                                class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                            <label for="remember-me" class="ml-3 block text-sm">
                                Remember me
                            </label>
                        </div>

                        <a href="jajvascript:void(0);" class="text-blue-600 hover:underline">
                            Forgot your password?
                        </a>
                    </div>

                    <div class="!mt-10">
                        <button type="submit"
                            class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-[#333] hover:bg-[#222] focus:outline-none">
                            Log in
                        </button>
                    </div>
                    <p class="text-sm mt-10 text-black text-center">Don't have an account <a href="/registration"
                            class="text-[#A6C0EE] hover:text-[#FBC2EB] font-semibold underline ml-1">Register here</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
