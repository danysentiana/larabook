@extends('admin.layouts.main')

@section('title', 'User List')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-5 gap-4 mb-10">
        <div class="flex pl-1  text-gray-700 border-none border-slate-400 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <h4 class="font-bold">User List</h4>
        </div>
       </div>
       <div class="items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
        @if (session('success'))
        <div class="absolute top-10 right-8 flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400 h-13" role="alert" id="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
            <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
        </div>
        @endif
        @if (session('error'))
        <div class="absolute top-10 right-8 flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-green-400 h-13" role="alert" id="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
            <span class="font-medium">Success!</span> {{ session('error') }}
            </div>
        </div>
        @endif

        <div class="mb-6">
        <div class="flex justify-start">
            <!-- Modal toggle -->
            {{-- <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Add Category
                <svg class="w-5 h-5 ml-2 -mr-1" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
            </button> --}}

            <a href="/admin/user-list" class="ml-1 text-white bg-gradient-to-tl from-purple-700 to-pink-500 duration-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Back to User Lists
            </a>
        </div>

        <div id="table-cat" class="mt-6">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full border">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b ">
                        <tr class="font-extrabold text-sm">
                            <th scope="col" class="px-1 py-4 text-center border-r">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-4 border-r ">
                                Username
                            </th>
                            <th scope="col" class="px-3 py-4 border-r text-center">
                                Phone Number
                            </th>
                            <th scope="col" class="px-5 py-4 text-center border-l">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ( $users->isEmpty() )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td colspan="4" class="px-4 py-4 text-center">
                                    <span class="text-base text-gray-400 font-semibold">No data available.</span>
                                </td>
                            </tr>
                        @else
                            {{-- {{  $users->firstItem() + $loop->index }}. --}}
                            @foreach ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="p-1 text-center border-r">
                                    {{ $loop->iteration }}
                                </td>
                                <th scope="row" class="border-r px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->username  }}
                                </th>
                                <th scope="row" class="text-center px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->phone  }}
                                </th>
                                <td class="px-5 py-2 text-center border-l">
                                    <a href="/admin/user-list/{{ $user->slug }}/detail" class="underline text-blue-600 font-semibold">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- pagination --}}
        <div class="mt-7 w-full">
            {{-- {{ $users->links() }} --}}
        </div>

    </div>
 </div>
@endsection

