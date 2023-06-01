@extends('admin.layouts.main')

@section('title', 'Deleted Book List')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-5 gap-4 mb-10">
        <div class="flex pl-1  text-gray-700 border-none border-slate-400 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <h4 class="font-bold">Book</h4>
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
        <a href="/admin/book-list" class="text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Back to Book List
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
                            <td class="px-5 py-2 text-center border-l">
                                {{-- Restore --}}
                                <button data-modal-target="restoreModal_{{ $book->id }}" data-modal-toggle="restoreModal_{{ $book->id }}" class="text-blue-500 font-medium rounded-lg text-sm px-1 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Restore
                                </button>
                                <div id="restoreModal_{{ $book->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="restoreModal_{{ $book->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <input type="hidden" name="id" value="{{ $book->id }}">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to restore book <span class="font-bold text-black">{{ $book->title }}</span> ?</h3>
                                                <button data-modal-hide="restoreModal_{{ $book->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                <a href="/admin/book-list/{{ $book->slug }}/restore"  class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Yes, I'm sure
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Perma Delete -->
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
                                            <div class="p-6 text-center">
                                                <form action="/admin/book-list/{{ $book->slug }}/permanently-delete" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="slug" value="{{ $book->slug }}">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to permanently delete book <span class="font-bold text-black">{{ $book->title }}</span> ?</h3>
                                                    <button data-modal-hide="delModal_{{ $book->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button>
                                                </form>
                                            </div>
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
@endsection


