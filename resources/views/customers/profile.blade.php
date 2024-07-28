<!-- resources/views/customer/profile.blade.php -->

@extends('layouts.app')

@section('title', 'Customer Profile')

@section('header-title', 'Your Profile')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profile Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="#" method="POST">
                        <!-- Assuming you're using Laravel's CSRF protection -->
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                        </div>
                        <!-- Add other fields as needed -->
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Add any additional styles for the profile page here -->
@endpush

@push('scripts')
<!-- Add any additional scripts for the profile page here -->
@endpush
