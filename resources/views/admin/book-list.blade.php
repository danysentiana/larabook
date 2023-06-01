@extends('admin.layouts.main')

@section('title', 'Category')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-5 gap-4 mb-10">
        <div class="flex pl-1  text-gray-700 border-none border-slate-400 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <h4 class="font-bold">Category</h4>
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

        <!-- Modal toggle -->
        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Add Book
            <svg class="w-5 h-5 ml-2 -mr-1" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
        </button>

        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add Book
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="/admin/book-list" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-6 space-y-6">
                            <div class="mb-1">
                                <label for="category_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Title</label>
                                <input type="text" id="category_input" name="title" value="{{ old('title') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                            </div>
                            <div class="mb-1">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Book Category</label>
                                <select name="category_id[]" id="category" required class="js-example-responsive" multiple="multiple">
                                    @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="w-full bg-red-500">
                                </div>
                            </div>
                            <div class="mb-1">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                                <input name="cover" value="{{ old('cover') }}" class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2  rounded-b dark:border-gray-600 justify-end">
                            <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                            <button data-modal-hide="defaultModal" type="submit" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <a href="/admin/category/deleted" class="text-white bg-gradient-to-tl from-gray-900 to-slate-800 hover:to-slate-700 duration-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Deleted Books
        </a>

        <div id="table-cat" class="mt-6">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full border">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b ">
                        <tr class="font-extrabold text-sm">
                            <th scope="col" class="px-1 py-4 text-center border-r">
                                No.
                            </th>
                            <th scope="col" class="px-8 py-4 border-r">
                                Title
                            </th>
                            <th scope="col" class="px-5 py-4 border-r text-center">
                                Category
                            </th>
                            <th scope="col" class="px-4 py-4 text-center">
                                Status
                            </th>
                            <th scope="col" class="px-3 py-4 text-center border-l">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-1 text-center border-r">
                                {{  $books->firstItem() + $loop->index }}.
                            </td>
                            <th scope="row" class="border-r px-8 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $book->title  }}
                            </th>
                            <th scope="row" class="border-r text-center px-5 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @foreach ($book->category as $cat)
                                <span class="bg-purple-100 text-purple-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">{{ $cat->name }}</span>
                                @endforeach
                            </th>
                            <th scope="row" class=" text-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $book->status  }}
                            </th>
                            <td class="flex px-3 py-2 border-l justify-center">
                                <!-- Modal Edit -->
                                <button data-modal-target="editModal_{{ $book->id }}" data-modal-toggle="editModal_{{ $book->id }}" class="text-blue-500 font-medium rounded-lg text-sm px-1 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>

                                <div id="editModal_{{ $book->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit Category
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editModal_{{ $book->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form method="POST" action="/admin/book-list/{{ $book->slug }}/edit" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-6 space-y-6">
                                                    <div class="mb-1">
                                                        <label for="category_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Title</label>
                                                        <input type="text" id="category_input" name="title" value="{{ $book->title }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Book Category</label>
                                                        <select name="category_id[]" id="category_{{ $book->id }}" required multiple>
                                                            @foreach( $book->category as $bookCat)
                                                            <option value="{{ $bookCat->id }}" selected>{{ $bookCat->name }}</option>
                                                            @endforeach
                                                            @foreach ($categories as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <script>
                                                            $(document).ready(function() {
                                                               $('#category_{{ $book->id }}').select2({
                                                                   placeholder: "Select a category",
                                                                   allowClear: true,
                                                                   width: '100%'
                                                               });
                                                            });
                                                            </script>
                                                        <div class="w-full bg-red-500">
                                                        </div>
                                                    </div>
                                                    <div class="mb-1">
                                                        @if ($book->cover != null)
                                                        <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Cover</label>
                                                        <img src="{{ asset('storage/images/'.$book->cover) }}" alt="{{ $book->title }}" class="w-32 h-32 object-cover rounded-lg">
                                                        @else
                                                        <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Cover</label>
                                                        <img src="{{ asset('images/default.png') }}" alt="{{ $book->title }}" class="border w-32 h-auto object-cover rounded-lg">


                                                        @endif
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Upload file</label>
                                                        <input name="cover" id="cover" class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex items-center p-6 space-x-2  rounded-b dark:border-gray-600 justify-end">
                                                    <button data-modal-hide="editModal_{{ $book->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Back</button>
                                                    <button data-modal-hide="editModal_{{ $book->id }}" type="submit" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Delete -->
                                <button data-modal-target="delModal_{{ $book->id }}" data-modal-toggle="delModal_{{ $book->id }}" class="text-red-500 font-medium rounded-lg text-sm px-1 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Delete
                                </button>

                                <div id="delModal_{{ $book->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delModal_{{ $book->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <form method="POST" action="/admin/category/{{ $book->slug }}/delete">
                                                @csrf
                                                @method('DELETE')
                                                <div class="p-6 text-center">
                                                    <input type="hidden" name="id" value="{{ $book->id }}">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete category {{ $book->name }}?</h3>
                                                    <button data-modal-hide="delModal_{{ $book->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                    <button data-modal-hide="delModal_{{ $book->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- pagination --}}
        <div class="mt-7 w-full">
            {{ $books->links() }}
        </div>

    </div>
 </div>

 <script>
 $(document).ready(function() {
    $('#category').select2({
        placeholder: "Select a category",
        allowClear: true,
        width: '100%'
    });
 });
 </script>
@endsection




