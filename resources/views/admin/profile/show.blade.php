@extends('layouts.admin')

@section('content')

<div class="it-container-page">

    <section class="it-section-page row">
 
       <div class="sx-profile col-8">
          <div class="top-sx glass">
 
             <div class="wrap-image">
                <img :src="profile.avatar_path" alt="avatar">
             </div>
 
             <div class="wrap-text">
                <h3>{{profile.name}} {{profile.surname}}</h3>
                <h5>{{profile.job_roles[0].name}}</h5>
                <h6>{{profile.region}}</h6>
             </div>
             
          </div>
          <div class="mid-sx glass">
             <h5> Livello: {{profile.level}}</h5>
             <div 
                v-if="profile.description"
                class="wrap-description"
             >
                <h5>Descrizione</h5>
                <p>{{profile.description}}</p>
             </div>
 
             <div 
                v-if="profile.cv_path"
                class="wrap-cv"
             >
                <h5>Scarica il curriculum</h5>
                <div class="it-btn">
                   <button>
                      <a :href="profile.cv_path">Clicca qui</a>
                   </button>
                </div>
                
             </div>
 
 
          </div>
          <div class="bottom-sx glass">
             <h5>Contatti</h5>
             <p>{{profile.email}}</p>
          </div>
       </div>
 
       <div class="dx-profile col-4">
          <div class="call-to-action glass">
 
             <h5>Rimani in contatto con {{profile.name}}</h5>
             <p>Compila il form e proponi la tua idea, entro poche ore verrai contattato dal nostro professionista!</p>
              <router-link :to="{name: 'MessageReviewForm'}">
                <div class="it-btn mb-4">
                   <button>Invia un messaggio</button>
                </div>
              </router-link>
             <h5>Valuta l'esperienza di {{profile.name}}</h5>
             <p>Hai già avuto a che fare con il nostro professionista? Lascia una recensione e aiuta gli altri utenti!</p>
             <router-link :to="{name: 'MessageReviewForm'}">
                <div class="it-btn">
                   <button>Scrivi una recensione</button>
                </div>
             </router-link>
          </div>
       </div>
 
       <div class="bottom-profile col-12">
          <div class="top-bottom glass">
             
             <h3>Recensioni</h3>
 
             <div class="contaier-reviews">
 
                <div 
                   class="wrap-review duble-glass"
                   v-for="review in profile.reviews"
                   :key="review.id"          
                >
 
                   <h6>{{review.title}}</h6>
                   <p>{{review.description}}</p>
                   <div class="wrap-span">
                      <div class="wrap-star">
                         <span
                            class="star"
                            v-for="(star, index) in review.vote"
                            :key="index"
                         >
                            <i class="fa fa-star" aria-hidden="true"></i>
                         </span>
                      </div>
       
                      <span class="date">
                         {{review.month}} / {{review.year}}
                      </span>
                
                   </div>
 
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