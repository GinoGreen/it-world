@extends('layouts.admin')

@section('content')



@foreach ($fields as $field )

<div class="container m-3">

    <div class="d-inline p-2 bg-primary text-white">{{$field}}</div>

    @if ($profile->$field === null)
        <div class="d-inline p-2 bg-danger text-white">{{$field}} non presente</div>
    @else
        <div class="d-inline p-2 bg-dark text-white">{{$profile->$field}}</div>   
    @endif
  
</div>
    
@endforeach

@endsection

@section('title')
    Profilo
@endsection