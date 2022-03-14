@extends('layouts.admin')

@section('content')
<div class="it-container-page">

   <section class="it-section-page flex-column justify-content-start row">
      <h1 class="text-center mb-5">I tuoi abbonamenti</h1>
      
      <div class="it-sub-top">
         <div class="it-sub-active glass">
            {{-- @dd(Auth::user()->premium_plans[count(Auth::user()->premium_plans) - 1]) --}}
            
            @if ( count(Auth::user()->premium_plans) > 0)
            <h2 class="text-center mb-5">IL TUO PIANO ATTIVO</h2>
               <div class="it-sub-box">
                  <div class="it-sub-active-info">
                     <p>Pacchetto scelto: 
                        <span>{{ Auth::user()->premium_plans[count(Auth::user()->premium_plans) - 1]->name }}</span>
                     </p>
                     <p>Prezzo: 
                        <span>€ {{ Auth::user()->premium_plans[count(Auth::user()->premium_plans) - 1]->price }}</span>
                     </p>
                     <p>
                        Il tuo piano scadrà tra 
                        <span>{{ Auth::user()->premium_plans[count(Auth::user()->premium_plans) - 1]->duration_days }}</span> 
                        @if (Auth::user()->premium_plans[count(Auth::user()->premium_plans) - 1]->duration_days > 1)
                           giorni
                        @else
                           giorno
                        @endif
                     </p>
                  </div>
                  <div class="it-sub-img">
                     <img src="/img/subscription.svg" alt="subscription">
                  </div>
               </div>
            @else
               <div class="it-sub-box">
                  <div class="it-sub-active-info">
                     <p>AL MOMENTO NON HAI ATTIVATO NESSUN ABBONAMENTO</p>
                  </div>
                  <div class="it-sub-img">
                     <img src="/img/subscription.svg" alt="subscription">
                  </div>
               </div>
            @endif
         </div>
      </div>

      
      <div class="it-sub-bottom">
         <h3>La cronologia dei tuoi pagamenti</h3>
   
         <div class="it-sub-list">
            <ul>
               @foreach (Auth::user()->premium_plans as $order)
                  {{-- @dump($order) --}}
                  <li>Pacchetto: {{ $order->name }} | Pagato: €{{ $order->price }}</li>
               @endforeach
            </ul>
         </div>
      </div>

   </section>

</div>
@endsection

@section('title')
   Transazione
@endsection