@extends('layouts.admin')

@section('content')
<div class="container">

    <h1>Dashboard</h1>

    <div>
        <h3>collegamenti</h3>
        <ul>
            <li>
                <a href="{{ route('admin.profile.edit', $profile) }}">Edit Profile</a>
            </li>
            <li>
                <a href="{{ route('admin.message') }}">My Messages</a>
            </li>
            <li>
                <a href="{{ route('admin.review') }}">My Reviews</a>
            </li>
            <li>
                <a href="{{ route('admin.statistic') }}">Statistics</a>
            </li>
        </ul>
    </div>



    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Sei loggato
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection

@section('title')
    Dashboard
@endsection