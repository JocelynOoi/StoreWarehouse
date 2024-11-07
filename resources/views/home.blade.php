{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome to My Laravel App</h1>
    <p class="lead">This is a simple application for managing categories and products in a warehouse.</p>
    <hr class="my-4">
    <p>Get started by browsing the categories or products below.</p>
    <a class="btn btn-primary btn-lg" href="/categories" role="button">View Categories</a>
    <a class="btn btn-secondary btn-lg" href="/products" role="button">View Products</a>
</div>

<div class="container">
    <h2>About Our Application</h2>
    <p>This application is designed to help you manage and organize your store's categories and products with ease.</p>

    <h3>Key Features</h3>
    <ul>
        <li>View and manage categories</li>
        <li>Browse and manage products</li>
        <li>User-friendly interface</li>
    </ul>
</div>
@endsection
