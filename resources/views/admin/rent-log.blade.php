@extends('admin.layouts.main')

@section('title', 'Rent Logs')

@section('content')
{{-- @dd($data) --}}
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-5 gap-4 mb-10">
        <div class="flex pl-1  text-gray-700 border-none border-slate-400 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <h4 class="font-bold">Rent Logs</h4>
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

        <!-- Modal Add Book Rent -->
        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Book Rent
        </button>

        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add Rent
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST" action="{{ route('rent-log.store') }}">
                        @csrf
                        <div class="p-6 space-y-6">
                            <div class="mb-6">
                                <label for="user_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                                <select id="user_input" name="user_id" required style="padding: 10px; border-radius: 8px;">
                                    <option data-placeholder="true"></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="book_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book</label>
                                <select id="book_input" name="book_id" required style="padding: 10px; border-radius: 8px;">
                                    <option data-placeholder="true"></option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2  rounded-b dark:border-gray-600 justify-end">
                            <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                            <button data-modal-hide="defaultModal" type="submit" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Add Book Return -->
        <button data-modal-target="returnBook" data-modal-toggle="returnBook" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Book Return
        </button>

        <!-- Main modal -->
        <div id="returnBook" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add Book Return
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="returnBook">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST" action="{{ route('return-book') }}">
                        @csrf
                        <div class="p-6 space-y-6">
                            <div class="mb-1">
                                <label for="user_return" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                                <select id="user_return" name="rent_id" onchange="dataRent()" required style="padding: 10px; border-radius: 8px;">
                                    <option data-placeholder="true"></option>
                                    @foreach ($rents as $rent)
                                        <option value="{{ $rent->id }}" id="rent_search" style="justify-content:space-between; display:block"> <h1>{{ $rent->user['username'] }}</h1> <h1>| {{ $rent->book['title'] }}</h1> </option>
                                    @endforeach
                                </select>
                                <div class="mt-4 grid grid-cols-4 gap-3">
                                    <div class="col-span-1">
                                        <label for="info_username">Username</label>
                                        <input type="text" id="info_username" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  disabled readonly>
                                    </div>
                                    <div class="col-span-3">
                                        <label for="info_book">Book Title</label>
                                        <input type="text" id="info_book" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  disabled readonly>
                                    </div>
                                </div>
                                <div class="mt-4 grid grid-cols-4 gap-3">
                                    <div class="col-span-2">
                                        <label for="info_rent_date">Rent Date</label>
                                        <input type="text" id="info_rent_date" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  disabled readonly>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="info_max_return">Max Return Date</label>
                                        <input type="text" id="info_max_return" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  disabled readonly>
                                    </div>
                                </div>
                                <script>
                                    function dataRent() {
                                        let rent = $('#user_return').val();
                                        $.ajax({
                                            url: "{{ route('get-rent') }}",
                                            type: "GET",
                                            data: {
                                                id: rent
                                            },
                                            success: function(data) {
                                                $('#info_username').val(data.user.username);
                                                $('#info_book').val(data.book.title);
                                                $('#info_rent_date').val(data.rent_date);
                                                $('#info_max_return').val(data.max_return_date);
                                            }
                                        });
                                    }
                                </script>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2  rounded-b dark:border-gray-600 justify-end">
                            <button data-modal-hide="returnBook" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                            <button data-modal-hide="returnBook" type="submit" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Return</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="table-cat" class="mt-6">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full border">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b ">
                        <tr class="font-extrabold text-sm text-center">
                            <th scope="col" class="px-1 py-4 border-r">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-4">
                                User
                            </th>
                            <th scope="col" class="px-5 py-4 border-l">
                                Book
                            </th>
                            <th scope="col" class="px-5 py-4 border-l">
                                Rent Date
                            </th>
                            <th scope="col" class="px-5 py-4 border-l">
                                Max Return Date
                            </th>
                            <th scope="col" class="px-5 py-4 border-l">
                                Return Date
                            </th>
                            <th scope="col" class="px-5 py-4 border-l">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rents as $rent)
                        <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-1 border-r">
                                {{-- {{  $rents->firstItem() + $loop->index }}. --}}
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row" class="px-6 py-3 border-r font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $rent->user['username']  }}
                            </th>
                            <th scope="row" class="border-r px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $rent->book['title']  }}
                            </th>
                            <th scope="row" class="border-r px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $rent->rent_date  }}
                            </th>
                            <th scope="row" class="border-r px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $rent->max_return_date  }}
                            </th>
                            <th scope="row" class="border-r px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($rent->return_date == null)
                                    Not Returned
                                @else
                                    {{ $rent->return_date  }}
                                @endif
                                {{-- {{ $rent->return_date  }} --}}
                            </th>
                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($rent->return_date == null)
                                    <p class="text-yellow-300">Rent</p>
                                @elseif($curr_date > $rent->max_return_date)
                                    <p class="text-red-500">Overdue</p>
                                @else
                                    <p class="text-green-300">Returned</p>
                                @endif
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- pagination --}}
        {{-- <div class="mt-7 w-full">
            {{ $categories->links() }}
        </div> --}}

    </div>
 </div>
 <script>
    new SlimSelect({
        select: '#user_input',
        settings: {
            placeholderText: 'Select User',
        },

    })
    new SlimSelect({
        select: '#book_input',
        settings: {
            placeholderText: 'Select Book',
        },
    })
    new SlimSelect({
        select: '#user_return',
        settings: {
            placeholderText: 'Select User',
        },

    })
    new SlimSelect({
        select: '#book_return',
        settings: {
            placeholderText: 'Select Book',
        },
    })
 </script>
@endsection

