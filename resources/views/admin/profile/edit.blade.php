@extends('layouts.admin')

@section('content')

<div class="container white-wrap-edit">

   <div class="row">

   

      <div class="col-3">
         <div class="wrap-avatar-edit"></div>
      </div>

      <div class="col-8 wrap-secondary-edit">

   


         <h1>Edit Pofile</h1>

         <form action="{{ route('admin.profile.update', $profile) }}" method="POST"    enctype="multipart/form-data">
         @method('PUT')
         @csrf
            <div class="mb-2">
               <label 
                  for="name" 
                  class="form-label"
               >Nome</label>
               <input 
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  value="{{ old('name', $profile->name) }}"
               >
            </div>

            <div>
               <label 
                  for="surname" 
                  class="form-label"
               >Cognome</label>
               <input 
                  type="text"
                  class="form-control"
                  id="surname"
                  name="surname"
                  value="{{ old('surname', $profile->surname) }}"
               >
            </div>

            <div class="mb-2">
               <label 
                  for="avatar_path" 
                  class="form-label"
               >Immagine profilo</label>
               <input 
                  type="file"
                  class="form-control"
                  id="avatar_path"
                  name="avatar_path"
               >
            </div>

            <div class="mb-2">
               <label 
                  for="email" 
                  class="form-label"
               >Email address</label>
               <input 
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  value="{{ old('email', $profile->email) }}"
               >
            </div>

            <div class="mb-2">
               <label 
                  for="region" 
                  class="form-label"
               >Ufficio</label>
               <select class="form-control" name="region" id="region">
                  <option value=""></option>
                  @foreach ($regions as $region)
                     <option 
                           value="{{ $region }}"
                           @if ($region === old('region', $profile->region))
                               selected
                           @endif
                     >{{ $region }}</option>
                  @endforeach
               </select>
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
                  for="email" 
                  class="form-label d-block"
               >Livello di esperienza</label>

               @foreach ($levels as $level)    
                  <div class="form-check d-inline-block">
                     <input 
                        class="form-check-input"
                        type="radio" 
                        name="level" 
                        id="{{ $level }}"
                        @if ($level === old('level', $profile->level))
                            checked
                        @endif
                        value="{{ $level }}"
                     >
                     <label class="form-check-label" for="level">
                        {{ $level }}
                     </label>
                  </div>
               @endforeach
            </div>

        <button type="submit" class="btn btn-primary">Modifica</button>

       </form>

    </div>   
   </div>
</div>
@endsection

@section('title')
    Modifica Profilo
@endsection