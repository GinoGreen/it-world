@extends('layouts.admin')

@section('content')
<div class="it-container-page">

   <section class="it-section-page flex-column justify-content-start row">
      <h1>Subscription</h1>
      {{-- tutti --}}
      @foreach (Auth::user()->premium_plans as $order)
         @dump($order)
      @endforeach
      {{-- ultimo --}}
      @dump(Auth::user()->premium_plans[count(Auth::user()->premium_plans) - 1])
   </section>

</div>
@endsection

@section('title')
   Transazione
@endsection