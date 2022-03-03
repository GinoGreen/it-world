@extends('layouts.admin')

@section('content')

<div class="white-wrapper-show">

   <div class="avatar-circle-show"></div>

   <div class="data-wrapper-show">

      @foreach ($fields as $field )

         <div class="container m-2 wrap-text-show">

            <div class="d-inline">{{$field}}</div>

            @if ($profile->$field === null)
               <div class="d-inline ">{{$field}} non presente</div>
            @else
               <div class="d-inline">{{$profile->$field}}</div>
            @endif

         </div>

      @endforeach

   </div>

</div>
@endsection

@section('title')
    Profilo
@endsection