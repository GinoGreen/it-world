@extends('layouts.admin')

@section('content')

<div class="white-wrapper-show">

   <h1>{{ Auth::user()->name }}</h1>

</div>
@endsection

@section('title')
    Profilo
@endsection