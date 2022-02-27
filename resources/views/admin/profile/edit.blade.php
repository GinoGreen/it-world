@extends('layouts.admin')

@section('content')
<div class="container">

    <h1>Edit Pofile</h1>

    <form action="post">
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
                for="name" 
                class="form-label"
            >Nome</label>
            <input 
                type="email"
                class="form-control"
                id="name"
                name="name"
                value="{{ old('name', $profile->name) }}"
            >
        </div>
    </form>

</div>
@endsection

@section('title')
    Modifica Profilo
@endsection