@extends('admin.layouts.main')

@section('title', 'User List')

@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700">
        <div class="flex justify-between  text-gray-700 border-none border-slate-400 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            {{-- <h4 class="font-bold">Detail</h4> --}}
            <a href="/admin/user-list" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Back to User List
            </a>
            @if ($user->status == 'inactive')
            <a href="/admin/user-list/{{ $user->slug }}/approve" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Approve User
            </a>
            @endif
        </div>
       <div class="grid grid-cols-5 gap-4 mb-10">
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
        <div class="grid grid-cols-3 grid-rows-4 gap-8">
            <div id="detail-container" class="rounded-md px-6 pt-4 pb-6 row-span-3 border-2 shadow">
                <h1 class="mb-4 font-bold">Detail User</h1>
                <div class="grid grid-cols-3 gap-1">
                    <div id="text-detail" class="grid grid-rows-4 gap-3">
                        <h1>Username</h1>
                        <h1>Email</h1>
                        <h1>Phone Number</h1>
                        <h1>Status</h1>
                    </div>
                    <div id="value-detail" class="pl-3 grid grid-rows-4 gap-3">
                        <h1>{{ $user->username }}</h1>
                        <h1>{{ $user->email }}</h1>
                        <h1>{{ $user->phone }}</h1>
                        <h1>{{ $user->status }}</h1>
                    </div>
                </div>
            </div>

            <div id="table-cat" class="col-span-2 row-span-4">
                <h1 class="mb-4 font-semibold">Borrowed Books</h1>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full border">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b ">
                            <tr class="font-extrabold text-sm">
                                {{-- <th scope="col" class="px-6 py-4 border-r ">
                                    No
                                </th> --}}
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
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                {{-- <th scope="row" class="border-r px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration  }}
                                </th> --}}
                                <th scope="row" class="border-r px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->username  }}
                                </th>
                                <th scope="row" class="text-center px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->phone  }}
                                </th>
                                <td class="px-5 py-2 text-center border-l">
                                    <a href="/admin/user-detail/{{ $user->slug }}/detail" class="underline text-blue-600 font-semibold">Detail</a>
                                </td>
                            </tr>
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
 </div>
@endsection

