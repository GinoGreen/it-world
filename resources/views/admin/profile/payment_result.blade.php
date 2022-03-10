@extends('layouts.admin')

@section('content')
<div class="it-container-page">

   <section class="it-section-page flex-column justify-content-start row">
      <h1>{{$data['message']}}</h1>
      <a href="{{ route('admin.home') }}">
         <div class="it-btn">
            <button>Torna alla dashboard</button>
         </div>
      </a>
   </section>

</div>
@endsection

@section('title')
   Transazione
@endsection