@extends('layouts.admin')

@section('content')
<div class="container">

    <h1>Edit Pofile</h1>

    <form action="{{ route('admin.profile.update', $profile) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label 
                for="name" 
                class="form-label"
            >Nome</label>
            <input 
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ old('name', $profile->name) }}"
            >
        </div>

        <div class="mb-3">
            <label 
                for="surname" 
                class="form-label"
            >Cognome</label>
            <input 
                type="text"
                class="form-control"
                id="surname"
                name="surname"
                value="{{ old('surname', $profile->surname) }}"
            >
        </div>

        <div class="mb-3">
            <label 
                for="email" 
                class="form-label"
            >Email address</label>
            <input 
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="{{ old('email', $profile->email) }}"
            >
        </div>

        <div class="mb-3">
            <label 
                for="region" 
                class="form-label"
            >Ufficio</label>
            <select class="form-control" name="region" id="region">
                <option value=""></option>
                @foreach ($regions as $region)
                    <option 
                        value="{{ $region }}"
                        @if ($region === old('region', $profile->region))
                            selected
                        @endif
                    >{{ $region }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>

    </form>

</div>
@endsection

@section('title')
    Modifica Profilo
@endsection