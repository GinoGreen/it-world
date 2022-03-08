@extends('layouts.admin')

@section('content')

<div class="it-container-page">

   <h1>{{ Auth::user()->name }}</h1>
    @dump(Auth::user()->review_length)
</div>
@endsection

@section('title')
    Profilo
@endsection