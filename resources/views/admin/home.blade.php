@extends('layouts.admin')

@section('content')
<div class="container">

    <h1>Dashboard</h1>
    {{-- <div> --}}
        {{-- <h3>collegamenti</h3>
        <ul>
            <li>
                <a href="{{ route('admin.profile.edit', $profile) }}">Edit Profile</a>
            </li>
            <li>
                <a href="{{ route('admin.profile.show', $profile) }}">Show Profile</a>
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
            <li>
                <a href="{{ route('chartjs.index') }}">Chartjs</a>
            </li>
            <li>
                <form onsubmit="return confirm(`Confermi l'eliminazione del profilo?`)"
                action="{{ route('admin.profile.destroy', $profile)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </li>
        </ul>
    </div> --}}




</div>
@endsection

@section('title')
    Dashboard
@endsection