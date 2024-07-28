@extends('layouts.app')


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

<div class="container">
    <h1>Customer Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $customer->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $customer->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $customer->phone }}</p>

            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
