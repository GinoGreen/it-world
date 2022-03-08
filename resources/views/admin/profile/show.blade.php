@extends('layouts.admin')

@section('content')

<div class="it-container-page">

   <section class="it-section-page row">
 
      <div class="sx-profile col-8">
         <div class="top-sx glass">
 
            <div class="wrap-image">
               <img src="{{ Auth::user()->avatar_path }}" alt="avatar">
            </div>
 
            <div class="wrap-text">
               <h3>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
               <h5>{{ Auth::user()->job_roles[0]->name }}</h5>
               <h6>{{ Auth::user()->region }}</h6>
            </div>
             
         </div>
         <div class="mid-sx glass">
            <h5> Livello: {{ Auth::user()->level }}</h5>
            <div 
            @if(Auth::user()->description)
               class="wrap-description"
            >
               <h5>Descrizione</h5>
               <p>{{ Auth::user()->description }}</p>
            @endif
            </div>
 
            <div 
               @if(Auth::user()->cv_path)
               class="wrap-cv"
            >
               <h5>Scarica il curriculum</h5>
               <div class="it-btn">
                  <button>
                     <a href="{{ Auth::user()->cv_path }}">Clicca qui</a>
                  </button>
               </div>
               @endif 
            </div>
 
 
         </div>
         <div class="bottom-sx glass">
            <h5>Contatti</h5>
            <p>{{Auth::user()->email}}</p>
         </div>
      </div>
 
      <div class="dx-profile col-4">
         <div class="call-to-action glass">
 
            <h5>Modifica il tuo profilo</h5>
            <p>Puoi in qualsiasi momento modificare il tuo profilo. Se qualcosa non ti convince premi il bottone!</p>
              
            <div class="it-btn mb-4">
               <button>
                  <a href="#">Modifica</a>
               </button>
            </div>
               
         </div>
      </div>
 
      <div class="bottom-profile col-12">
         <div class="top-bottom glass">
             
            <h3>Recensioni</h3>
 
            <div class="contaier-reviews">
 
               <div 
                  class="wrap-review duble-glass"
                  @foreach ( as $review)
            
               >
 
                  <h6>titolo recensione</h6>
                  <p>contenuto recensione</p>
                  <div class="wrap-span">
                     <div class="wrap-star">
                        <span
                           class="star"
                            
                        >
                           <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                     </div>
       
                     <span class="date">
                        mese / anno
                     </span>
                
                  </div>

                  @endforeach
               </div>
 
            </div>
             
         </div>
 
      </div>
 
 
   </section>
 
</div>
@endsection

@section('title')
    Profilo
@endsection