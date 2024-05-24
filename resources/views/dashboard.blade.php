<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Navigation') }}</div>

                <div class="list-group list-group-flush">
                    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action">Profile</a>
                    <a href="{{ route('settings') }}" class="list-group-item list-group-item-action">Settings</a>
                    <a href="{{ route('reports') }}" class="list-group-item list-group-item-action">Reports</a>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Welcome,') }} {{ Auth::user()->name }}!</p>
                    <p>{{ __('Your email address is:') }} {{ Auth::user()->email }}</p>
                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
