@extends('layouts.admin')

@section('content')
<div class="container">
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

                        <div class="form-group row">
                            <label for="job_role" class="col-md-4 col-form-label text-md-right">Specializzazione</label>

                            <div class="col-md-6">
                                <select
                                    name="job_role" 
                                    id="job_role"
                                    class="form-control"
                                >
                                    <option value="">Scegli il tuo ruolo</option>
    
                                    @foreach ($job_roles as $job_role)
                                        <option
                                            @if($job_role->name == old('job_role'))
                                                selected
                                            @endif
                                            value="{{ $job_role->name }}"
                                        >{{ $job_role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                            <div class="col-md-6 offset-md-4">
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