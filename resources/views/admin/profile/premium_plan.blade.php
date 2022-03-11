@extends('layouts.admin')

@section('content')
<div class="it-container-page">

   <section class="it-section-page row">
      <h1>Scegli tra i nostri piani</h1>
      <div class="wrapper row mt-5">
         
         @foreach($plans as $plan)
         <div class="table glass premium col-12 col-xl-3 mr-auto ml-auto mb-5 mt-5">
           <div class="head_tab"><h2>{{$plan->name}}</h2></div>
           <div><p class="text-light">durata: {{$plan->duration_days}} giorni</p></div>
           @if ($plan->name === 'Premium')
            <div class="ribbon"><span>BEST VALUE</span></div> 
           @endif
           <div class="price-section">
             <div class="price-area">
               <div class="inner-area">
                 <span class="price">{{$plan->price}}€</span>
               </div>
             </div>
           </div>
           <div class="package-name"></div>
           <a href="{{ route('admin.generateOrder', $plan) }}" class="features">
             <div class="btn"><button>aggiungi al carrello</button></div>
           </a>
         </div>
         @endforeach
       </div>
      {{-- @dump($plans) --}}
   </section>

</div>
@endsection

@section('title')
   Piani
@endsection