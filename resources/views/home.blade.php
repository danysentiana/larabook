@extends('layouts.main')

@section('title', 'Home')

@section('content')
{{-- @dd($checked_category) --}}


<div class="pb-20 px-72">
    <form method="GET" action="{{ route('home') }}">
        <label for="default-search" class="text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="search" name="search" id="default-search" value="{{ request('search') }}" class="block w-full px-4 py-6 pl-14 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos...">
            <button type="submit" class="search-and-filter text-white absolute right-2.5 bottom-2.5 bg-gradient-to-tl from-purple-700 to-pink-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
</div>

<div class="container">
    <div class="flex flex-row">
            <div id="filter" class="px-10 mr-20 rounded-lg w-full">
                @foreach ($categories as $cat)
                <div class="flex items-center py-1 w-56">
                    {{-- @foreach ($checked_category as $checked_cat)
                    @if ($checked_cat == $cat->id)
                    <input id="checked-checkbox-{{ $cat->id }}" type="checkbox" name="category[]" value="{{ $cat->id }}" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $checked_cat == $cat->id ? 'checked' : '' }}>
                    @else
                    @endif
                    @endforeach --}}
                    <input id="checked-checkbox-{{ $cat->id }}"  type="checkbox" name="category[]" value="{{ $cat->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $checked_category == $cat->id ? 'checked' : '' }}>
                    <label for="checked-checkbox-{{ $cat->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $cat->name }}</label>
                </div>

                @endforeach
                <button type="submit" class="search-and-filter mt-5 w-56  uppercase text-white bg-gradient-to-tl from-purple-700 to-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  py-2.5 text-center  items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Filter
                </button>
            </div>
        </form>
        <div id="book-list">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4 md:gap-9">
                @foreach ($books as $book)
                <div id="book">
                    <div class="relative">
                        <img src="{{ asset('storage/images/'.$book->cover) }}" class="rounded-lg p-4 border hover:border-2 " alt="">
                        <span class="absolute top-3 right-2 {{ $book->status == 'available' ? 'bg-green-200' : 'bg-red-200' }} text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $book->status }}</span>
                    </div>
                    <h1 class="text-center mt-3">{{ $book->title }}</h1>
                    @foreach ($book->category as $cats)
                    <h1 class="text-center mt-3">cat= {{ $cats->name }}</h1>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    // this is the class of the submit button
    // $(".search-and-filter").click(function() {
    //     $.ajax({
    //         type: "GET",
    //         url: "{{ route('book-list') }}",
    //         data: {
    //             cat_id: $("input[name='cat_id']:checked").map(function() {
    //                 return $(this).val();
    //             }).get(),
    //             search: $("#default-search").val(),
    //         },
    //         success: function(data) {
    //             $("#book-list").html(data);
    //         }
    //     });

    //     })
    </script>
@endsection
