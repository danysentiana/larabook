<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    {{-- <link rel="icon" type="image/png" href="../assets/img/favicon.png" /> --}}
    <title>Larabook | Register</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/572104c9c2.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
  </head>

  <body class="font-sans antialiased font-normal bg-gradient-to-tl from-purple-700 to-pink-500 text-start text-base leading-default text-slate-500">

    <main class="transition-all duration-200 ease-soft-in-out">
        <div class="relative flex items-center  overflow-hidden bg-center bg-cover ">
            <div class="container z-10">
            <div class="flex flex-wrap mx-auto h-screen">
                <div class="flex flex-col w-full px-3 m-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                <div class="relative flex flex-col  justify-center  break-words bg-white  border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 border-b-0 rounded-t-2xl mb-4">
                    <h3 class="text-center relative z-10 font-bold text-xl text-transparent bg-gradient-to-tl from-purple-700 to-pink-500 bg-clip-text mb-1">Welcome to Larabook</h3>
                    <p class="text-center mb-0">Sign up to read a variety of interesting books</p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="flex-auto p-6">
                    <form role="form" action="" method="POST">
                        @csrf
                        {{-- username --}}
                        <div id="username" class="mb-4">
                            <label for="username-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                @
                            </div>
                            <input type="text" name="username" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required>
                            </div>
                        </div>
                        {{-- Email --}}
                        <div id="email" class="mb-4">
                            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </div>
                            <input type="email" name="email" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="mail@email.com" required>
                            </div>
                        </div>
                        {{-- Password --}}
                        <div id="pass" class="mb-4">
                            <label for="pass-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-key"></i>
                            </div>
                            <input type="password" name="password" id="pass-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
                            </div>
                        </div>
                        {{-- Password Confirmation --}}
                        <div id="pass">
                            <label for="pass-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-key"></i>
                            </div>
                            <input type="password" name="password_confirmation" id="pass-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password confirmation" required>
                            </div>
                        </div>
                        <div class="text-center">
                        <button type="submit" class="bg-gradient-to-tl from-purple-700 to-pink-500 inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft hover:scale-102 hover:shadow-soft-xs active:opacity-85">Register</button>
                        </div>
                    </form>
                    </div>
                    <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                    <p class="mx-auto mb-6 leading-normal text-sm">
                        Already have an account?
                        <a href="/login" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-purple-700 to-pink-500 bg-clip-text">Sign in</a>
                    </p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </main>
  </body>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>
</html>
