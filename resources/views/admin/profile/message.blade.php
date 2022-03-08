@extends('layouts.admin')

@section('content')
<div class="container white-wrap-msg">

   @foreach ($messages as $message )
      <div class="row">
         <div class="col-11 wrap-content-msg">
            <h3 class="d-inline">{{$message->name}}</h3>
            <div class="wrap-secondary-msg">
               <p>{{$message->message}}</p>
               <h6>{{$message->date}}</h6>
            </div>
         </div>
      </div>
   @endforeach
   <div class="paginate">        
      {{$messages->links()}}
    </div>
   
</div>
@endsection

@section('title')
   Messaggi
@endsection