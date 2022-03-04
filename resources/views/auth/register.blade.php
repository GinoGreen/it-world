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

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrati per offrire i tuoi servizi</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name"
                                    type="text" 
                                    class="form-control 
                                    @error('name') 
                                        is-invalid 
                                    @enderror" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    autofocus
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Cognome</label>

                            <div class="col-md-6">
                                <input id="surname"
                                    type="text" 
                                    class="form-control 
                                    @error('surname') 
                                        is-invalid 
                                    @enderror" 
                                    name="surname" 
                                    value="{{ old('surname') }}"
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email"
                                    type="email" 
                                    class="form-control 
                                    @error('email') 
                                        is-invalid 
                                    @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}"
                                >
                            </div>
                        </div>

                        <p class="it-job-role-title col-md-12 text-light">
                            In cosa sei specializzato?
                        </p>
                        <div class="it-job-role-wrapper form-group row px-5">
                            @foreach ($job_roles as $job_role)
                            <div class="it-job-role col-3">
                                <input type="checkbox"
                                    class="form-check-input"
                                    id="job_role{{ $job_role->id }}"
                                    name="job_roles[]"
                                    value="{{ $job_role->id }}"
                                    @if (in_array($job_role->id, old('job_roles', [])))
                                        checked
                                    @endif
                                >
                                
                                <label class="form-check-label mr-5"
                                    for="job_role{{ $job_role->id }}"
                                >{{ $job_role->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">Locazione Ufficio</label>

                            <div class="col-md-6">
                                <select
                                    name="region" 
                                    id="region"
                                    class="form-control"
                                >
                                    <option value="">Da dove lavori?</option>
    
                                    @foreach ($regions as $region)
                                        <option
                                            @if($region == old('region'))
                                                selected
                                            @endif
                                            value="{{ $region }}"
                                        >{{ $region }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">Livello di esperienza</label>

                            <div class="col-md-6">
                                <select
                                    name="level" 
                                    id="level"
                                    class="form-control"
                                >
                                    <option value="">Come ti qualifichi?</option>
    
                                    @foreach ($levels as $level)
                                        <option
                                            @if($level == old('level'))
                                                selected
                                            @endif
                                            value="{{ $level }}"
                                        >{{ $level }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" 
                                    type="password" 
                                    class="form-control 
                                    @error('password') 
                                        is-invalid 
                                    @enderror" 
                                    name="password" 
                                    required 
                                    autocomplete="new-password"
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" 
                                    type="password" 
                                    class="form-control" 
                                    name="password_confirmation" 
                                    required autocomplete="new-password"
                                >
                            </div>
                        </div>

                        {{-- submit --}}
                        <div class="form-group row mb-0">
                            <div class="it-button-register col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title')
    Registrati
@endsection