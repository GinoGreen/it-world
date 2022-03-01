@extends('layouts.admin')

@section('content')
<div class="container m-3">
    <div class="d-inline p-2 bg-primary text-white">nome</div>
    <div class="d-inline p-2 bg-dark text-white">{{$profile->name}}</div>
</div>
<div class="container m-3">
    <div class="d-inline p-2 bg-primary text-white">cognome</div>
    <div class="d-inline p-2 bg-dark text-white">{{$profile->surname}}</div>
</div>
<div class="container m-3">
    <div class="d-inline p-2 bg-primary text-white">cognome</div>
    <div class="d-inline p-2 bg-dark text-white">{{$profile->surname}}</div>
</div>
<div class="container m-3">
    <div class="d-inline p-2 bg-primary text-white">cognome</div>
    <div class="d-inline p-2 bg-dark text-white">{{$profile->surname}}</div>
</div>
@endsection

@section('title')
    Profilo
@endsection