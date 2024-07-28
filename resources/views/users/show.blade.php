<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('title', 'User Details')

@section('content')
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb d-flex align-items-center">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Create
        </li>
        <li class="breadcrumb-item ml-auto"> <!-- Use ml-auto to push logout to the right -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a href="#" class="breadcrumb-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> <!-- Font Awesome icon for logout -->
                <span>Logout</span>
            </a>
        </li>
    </ol>
</nav>
@endsection

<div class="container mt-4">
    <h2>User Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
