@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200  rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-3 gap-4 mb-4">
          Halaman Dashboard
       </div>
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          {{-- <p class="text-2xl text-gray-400 dark:text-gray-500">+</p> --}}
          <div class="container mx-auto p-6">
            <div class="grid grid-cols-3 gap-6 justify-center">
                <div id="card" class="block w-30 p-6 bg-white border border-gray-200 rounded-lg shadow ">
                    <div class="flex flex-row text-white justify-between">
                        <div class="flex flex-col text-black">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight ">Books</h5>
                            <p class="font-normal ">{{ $countBook }}</p>
                        </div>
                        <div class="w-16 h-auto bg-gradient-to-tl from-purple-700 to-pink-500 text-center rounded-lg">
                            <i class="fa-solid fa-book text-4xl leading-none relative top-3"></i>
                        </div>
                    </div>
                </div>
                <div id="card" class="block w-30 p-6 bg-white border border-gray-200 rounded-lg shadow bg-gradient-to-tl from-gray-900 to-slate-800">
                    <div class="flex flex-row text-white justify-between">
                        <div class="flex flex-col text-white">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight ">Categories</h5>
                            <p class="font-normal ">{{ $countCat }}</p>
                        </div>
                        <div class="w-16 h-auto  text-center rounded-lg">
                            <i class="fa-solid fa-layer-group text-4xl leading-none relative top-3"></i>
                        </div>
                    </div>
                </div>
                <div id="card" class="block w-30 p-6 bg-white border border-gray-200 rounded-lg shadow ">
                    <div class="flex flex-row text-white justify-between">
                        <div class="flex flex-col text-black">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight ">Users</h5>
                            <p class="font-normal ">{{ $countUser }}</p>
                        </div>
                        <div class="w-16 h-auto bg-gradient-to-tl from-purple-700 to-pink-500 text-center rounded-lg">
                            <i class="fa-solid fa-book text-4xl leading-none relative top-3"></i>
                        </div>
                    </div>
                </div>

            </div>
          </div>
       </div>
       <div class="grid grid-cols-2 gap-4 mb-4">
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
          </div>
       </div>
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
       </div>
       <div class="grid grid-cols-2 gap-4">
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
          </div>
       </div>
    </div>
 </div>
@endsection
