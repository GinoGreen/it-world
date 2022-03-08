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
            <div class="it_card">
                <div class="card-header">Unisciti a IT World</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="it_input it_field">

                            <input id="name"
                                type="text" 
                                class="it_input_field
                                @error('name') 
                                    is-invalid 
                                @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                autofocus
                            >
                            <label for="name">Nome</label>

                            <div class="it_input_border outer">
                                <div class="it_input_border inner"></div>
                            </div>
                        </div>

                        <div class="it_input it_field">

                            <input id="surname"
                                type="text" 
                                class="it_input_field 
                                @error('surname') 
                                    is-invalid 
                                @enderror" 
                                name="surname" 
                                value="{{ old('surname') }}"
                            >
                            <label for="surname">Cognome</label>

                            <div class="it_input_border outer">
                                <div class="it_input_border inner"></div>
                            </div>
                        </div>

                        <div class="it_input it_field">
                            
                            <input id="email"
                                type="email" 
                                class="it_input_field
                                @error('email') 
                                    is-invalid 
                                @enderror" 
                                name="email" 
                                value="{{ old('email') }}"
                            >
                            <label for="email">Email</label>

                            <div class="it_input_border outer">
                                <div class="it_input_border inner"></div>
                            </div>
                        </div>

                        <div class="it-job-role-wrapper it_input_field px-5 mt-5">
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
                                    @if (in_array($job_role->id, old('job_roles', [])))
                                        checked
                                    @endif
                                >
                                
                                <label
                                    for="job_role{{ $job_role->id }}"
                                >{{ $job_role->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="it_input it_field it-select-wrapper">
                            {{-- <label for="region" class="it-select-label">Locazione Ufficio</label> --}}

                            <select
                                name="region" 
                                id="region"
                                class="it_input_select it-select-select"
                            >
                                <option class="it-select-option" value="">Da dove lavori?</option>

                                @foreach ($regions as $region)
                                    <option
                                        class="it-select-option"
                                        @if($region == old('region'))
                                            selected
                                        @endif
                                        value="{{ $region }}"
                                    >{{ $region }}</option>
                                @endforeach
                            </select>
                            <div class="it-select-icon">
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </div>
                            <div class="it-select-border"></div>
                        </div>

                        <div class="it_input it_field it-select-wrapper">
                            {{-- <label for="level">Livello di esperienza</label> --}}

                                <select
                                    name="level" 
                                    id="level"
                                    class="it_input_select it-select-select"
                                >
                                    <option class="it-select-option" value="">Come ti qualifichi?</option>
    
                                    @foreach ($levels as $level)
                                        <option class="it-select-option"
                                            @if($level == old('level'))
                                                selected
                                            @endif
                                            value="{{ $level }}"
                                        >{{ $level }}</option>
                                    @endforeach
                                </select>
                                <div class="it-select-icon">
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </div>
                                <div class="it-select-border"></div>
                        </div>

                        <div class="it_input it_field">
                            <input id="password" 
                                type="password" 
                                class="it_input_field 
                                @error('password') 
                                    is-invalid 
                                @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                            >
                            <label for="password">Password</label>

                            <div class="it_input_border outer">
                                <div class="it_input_border inner"></div>
                            </div>
                        </div>

                        <div class="it_input it_field">
                            
                            <input id="password-confirm" 
                                type="password" 
                                class="it_input_field" 
                                name="password_confirmation" 
                                required autocomplete="new-password"
                            >
                            <label for="password-confirm">Conferma password</label>

                            <div class="it_input_border outer">
                                <div class="it_input_border inner"></div>
                            </div>
                        </div>

                        {{-- submit --}}
                        <div class="it-btn">
                            <button type="submit">
                                Registrati
                            </button>
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