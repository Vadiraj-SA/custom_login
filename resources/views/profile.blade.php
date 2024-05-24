@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    <p>{{ __('This is the profile page.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
