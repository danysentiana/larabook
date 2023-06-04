<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" /> --}}
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.png') }}" />
    <title>Larabook | Login</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/572104c9c2.js" crossorigin="anonymous"></script>

    <link href="{{ url('assets/css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>

  <body class="m-0 font-sans antialiased font-normal bg-gradient-to-tl from-purple-700 to-pink-500 text-start text-base text-slate-500 h-screen">
    {{-- flash msg --}}
    @if (session('success'))

    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <span class="font-medium">Info alert!</span> {{ session('success') }}
    </div>
    @endif

    @if (session('error'))

    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <span class="font-medium">Info alert!</span> {{ session('error') }}
    </div>

    @endif
    {{-- flash msg end --}}
    <main class="mt-0 transition-all duration-200 ease-soft-in-out ">
      <section>
        <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
          <div class="container z-10">
            <div class="flex flex-wrap mt-0 -mx-3">
              <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                <div class="relative flex flex-col min-w-0 mt-32 break-words bg-white  border-0 shadow-none rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0  border-b-0 rounded-t-2xl">
                    <h3 class="text-center text-xl relative z-10 font-bold text-transparent bg-gradient-to-tl from-purple-700 to-pink-500 bg-clip-text">Welcome back</h3>
                    <p class="text-center mb-0">Enter your username and password to sign in</p>
                  </div>
                  <div class="flex-auto p-6">
                    <form role="form" action="" method="POST">
                        @csrf
                        <div id="username" class="mb-4">
                            <label for="username-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                @
                            </div>
                            <input type="text" name="username" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required>
                            </div>
                        </div>
                        <div id="pass" class="mb-4">
                            <label for="pass-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Password</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-key"></i>
                            </div>
                            <input type="password" name="password" id="pass-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
                            </div>
                        </div>
                      <div class="text-center">
                        <button type="submit" class="inline-block w-full px-6 py-4 mt-2 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Login</button>
                      </div>
                    </form>
                  </div>
                  <div class="py-2 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                    <p class="mx-auto mb-6 leading-normal text-sm">
                      Don't have an account?
                      <a href="/register" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-purple-700 to-pink-500 bg-clip-text">Sign up</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

  </body>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>
</html>
