@extends('layouts.admin')

@section('content')
<div class="container">
    
    {{-- ERRORI --}}
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    {{-- /ERRORI --}}

<div class="container white-wrap-edit">

   <div class="row">

      <div class="col-3 wrap-sx">
         <div class="wrap-avatar">
            @if (Auth::user()->avatar_path)
               <img src="{{ asset('storage/' . Auth::user()->avatar_path) }}" alt="avatar">
            @else
               <img src="{{ asset('img/slider/undraw_profile_pic_ic-5-t.svg') }}" alt="avatar">
            @endif
         </div>
         <h5>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h5>
         <h6>{{ Auth::user()->job_roles[0]->name }}</h6>
      </div>

      <div class="col-8 wrap-secondary-edit">

         <h1>Edit Pofile</h1>

         <form action="{{ route('admin.update', $profile) }}" method="POST" enctype="multipart/form-data">
         @method('PUT')
         @csrf
            <div class="it_input it_field">
               <input 
                  type="text"
                  class="it_input_field
                  @error('name') 
                     is-invalid 
                  @enderror" 
                  id="name"
                  name="name"
                  value="{{ old('name', $profile->name) }}"
               >
               <label for="name">Nome</label>

               <div class="it_input_border outer">
                  <div class="it_input_border inner"></div>
              </div>
            </div>

            <div class="it_input it_field">
               <input 
                  type="text"
                  class="it_input_field
                  @error('surname') 
                     is-invalid 
                  @enderror" 
                  id="surname"
                  name="surname"
                  value="{{ old('surname', $profile->surname) }}"
               >

               <label for="surname">Cognome</label>

               <div class="it_input_border outer">
                  <div class="it_input_border inner"></div>
               </div>

            </div>

            <div class="it_input it_field">
               <input 
                  type="email"
                  class="it_input_field
                  @error('email') 
                     is-invalid 
                  @enderror" 
                  id="email"
                  name="email"
                  value="{{ old('email', $profile->email) }}"
               >
               <label for="email">Email address</label>

               <div class="it_input_border outer">
                  <div class="it_input_border inner"></div>
              </div>

            </div>

            <div class="it-job-role-wrapper it_input_selection px-5">
               <p class="it-job-role-title">
                   In cosa sei specializzato?
               </p>
               @foreach ($job_roles as $job_role)
               <div class="it-job-role">
                  <input type="checkbox"
                     class="it_input_checkbox"
                     id="job_role{{ $job_role->id }}"
                     name="job_roles[]"
                     value="{{ $job_role->id }}"
                     @if (!$errors->any() && $profile->job_roles->contains($job_role->id))
                        checked
                     @elseif ($errors->any() && in_array($job_role->id, old('job_roles', [])))
                        checked
                     @endif
                  >
                  
                  <label
                     for="job_role{{ $job_role->id }}"
                  >{{ $job_role->name }}</label>
               </div>
               @endforeach
           </div>
               
                  

            <div class="it_input_selection it-select-wrapper">

               <select class="it_input_select it-select-select" 
                  name="region" 
                  id="region"
               >
                  <option value="">Da dove lavori?</option>
                  @foreach ($regions as $region)
                     <option 
                        class="it-select-option"
                        value="{{ $region }}"
                        @if ($region === old('region', $profile->region))
                              selected
                        @endif
                     >{{ $region }}</option>
                  @endforeach
               </select>
               <div class="it-select-icon">
                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
               </div>
               <div class="it-select-border"></div>
            </div>

            <div class="mb-2">
               <label 
                  for="cv_path" 
                  class="form-label"
               >Curriculum Vitae</label>
               <input 
                  type="file"
                  class="form-control"
                  id="cv_path"
                  name="cv_path"
               >
            </div>

            <div class="mb-2">
               <label 
                  for="avatar_path" 
                  class="form-label"
               >Avatar</label>
               <input 
                  type="file"
                  class="form-control"
                  id="avatar_path"
                  name="avatar_path"
               >
            </div>

            <div class="it_input_selection it-select-wrapper">

               <select class="it_input_select it-select-select" 
                  name="level" 
                  id="region"
               >
                  <option value="">Seleziona esperienza</option>
                  @foreach ($levels as $level)
                     <option 
                        class="it-select-option"
                        value="{{ $level }}"
                        @if ($level === old('level', $profile->level))
                              selected
                        @endif
                     >{{ $level }}</option>
                  @endforeach
               </select>
               <div class="it-select-icon">
                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
               </div>
               <div class="it-select-border"></div>
            </div>

            <div class="it_input it_textarea">
               
               <textarea name="description" 
                  class="it_input_field"
                  id="description" 
                  cols="30" 
                  rows="10"
               >{{ old('description', $profile->description) }}</textarea>
               
               <label for="description">Presentati</label>
            </div>

            <div class="it-btn">
               <button type="submit" >Salva</button>
            </div>

         </form>

      </div>   
   </div>
</div>
@endsection

@section('title')
    Modifica Profilo
@endsection