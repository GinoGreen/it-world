@extends('layouts.admin')

@section('content')
<div class="it-page-title">
   <h3>I miei Messaggi</h3>
 </div>

<div class="container it-message-wrapper mt-3">

   @foreach ($messages as $message )
      <div class="row">
         <div class="col-11 it-message-box">
            <h3 class="it-m-name d-inline">{{$message->name}}</h3>
            <div class="it-m-text">
               <p class="it-m-mail">inviato da {{$message->email}}</p>
               <p class="it-m-description">{{$message->message}}</p>
               <p class="it-m-date">{{$message->created_at}}</p>
               {{-- <p class="it-m-date">{{$message->date}}</p> --}}
            </div>
         </div>
      </div>
   @endforeach
   <div class="paginate mt-3">        
      {{$messages->links()}}
   </div>
   
</div>
@endsection

@section('title')
   Messaggi
@endsection