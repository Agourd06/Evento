<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>Document</title>
</head>

<body class="bg-[#303030] p-2">
    <div class="max-w-4xl mx-auto font-[sans-serif] text-[#333] p-6 bg-white rounded-md ">
        <div class="text-center mb-16">
            <a href="javascript:void(0)"><img src="{{ asset('storage/image/' . 'logo.png') }}" alt="logo"
                    class='w-44 inline-block' />
            </a>
            <h4 class="text-base font-semibold mt-3">Sign up into your account</h4>
            <div class="text-red-500 text-[20px] w-full text-center">
              @if ($errors->any())
                  <div>{{ $errors->first() }}</div>
              @endif
          </div>
        </div>
        <form action="/register" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="grid sm:grid-cols-2 gap-y-7 gap-x-12">
                <div>
                    <label class="text-sm mb-2 block">First Name</label>
                    <input name="first_name" type="text"
                        class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                        placeholder="Enter name" />
                </div>
                <div>
                    <label class="text-sm mb-2 block">Last Name</label>
                    <input name="last_name" type="text"
                        class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                        placeholder="Enter last name" />
                </div>
                <div>
                    <label class="text-sm mb-2 block">Email</label>
                    <input name="email" type="text"
                        class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                        placeholder="Enter email" />
                </div>
                <div>
                    <label class="text-sm mb-2 block">Mobile No.</label>
                    <input name="phone" type="number"
                        class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                        placeholder="Enter mobile number" />
                </div>
                <div>
                    <label class="text-sm mb-2 block">Password</label>
                    <input name="password" type="password"
                        class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                        placeholder="Enter password" />
                </div>
                <div>
                    <label class="text-sm mb-2 block">Confirm Password</label>
                    <input name="cpassword" type="password"
                        class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                        placeholder="Enter confirm password" />
                </div>
                <div class=" font-[sans-serif] ">
                  <label class="text-sm mb-2 block">Profile picture : </label>

                    <input type="file" name="profile"
                        class="w-full text-black text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-[#A6C0EE] duration-300 file:hover:bg-[#FBC2EB] file:text-white rounded" />
                </div>
                <div>
                  <label class="text-sm mb-2 block">Start as :</label>

                <select id="role" name="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected disabled>Choose a role</option>
                    <option value="organizer">organizer</option>
                    <option value="client">Eventor</option>
              
                </select>
                </div>
          
            </div>
            <div class="!mt-10">
                <button type="submit"
                    class="min-w-[150px] py-3 px-4 text-sm font-semibold rounded text-white bg-[#A6C0EE] hover:bg-[#FBC2EB] duration-300 focus:outline-none">
                    Sign up
                </button>
            </div>
            <p class="text-sm mt-6 text-center">Already have an account? <a href="/"
                    class="text-[#A6C0EE] hover:text-[#FBC2EB] font-semibold hover:underline ml-1">Login here</a></p>

        </form>
    </div>
</body>

</html>
