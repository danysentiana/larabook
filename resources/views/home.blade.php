@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container">
    {{-- <div class="grid grid-cols-4 gap-9 place-items-center">
        <div class="bg-red-400 h-96 w-64"></div>
        <div class="bg-red-400 h-96 w-64"></div>
        <div class="bg-red-400 h-96 w-64"></div>
        <div class="bg-red-400 h-96 w-64"></div>
        <div class="bg-red-400 h-96 w-64"></div>
        <div class="bg-red-400 h-96 w-64"></div>
    </div> --}}

    <div class="grid grid-cols-2 gap-4 md:grid-cols-4 md:gap-9 place-items-center">
        <div id="book" class="">
            <img src="{{ asset('images/default.png') }}" class="border-4 rounded-lg" alt="">
            <h1 class="text-center mt-3 md:text-xl">Judul Buku</h1>
        </div>
        <div id="book">
            <img src="{{ asset('images/default.png') }}" class="border-4 rounded-lg" alt="">
            <h1 class="text-center mt-3 md:text-xl">Judul Buku</h1>
        </div>
        <div id="book" class="">
            <img src="{{ asset('images/default.png') }}" class="border-4 rounded-lg max-w-full" alt="">
            <h1 class="text-center mt-3 md:text-xl">Judul Buku</h1>
        </div>
        <div id="book">
            <img src="{{ asset('images/default.png') }}" class="border-4 rounded-lg" alt="">
            <h1 class="text-center mt-3 md:text-xl">Judul Buku</h1>
        </div>

    </div>
</div>

@endsection
