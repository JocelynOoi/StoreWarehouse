{{-- resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>
    <p>Here is a list of categories:</p>

    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection
