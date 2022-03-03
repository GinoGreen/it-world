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
      {{-- @dd($profile->job_roles) --}}
      @foreach ($profile->job_roles as $job_role)
         <div class="d-inline">{{$job_role->name}}</div>
      @endforeach

   </div>

</div>
@endsection

@section('title')
    Profilo
@endsection