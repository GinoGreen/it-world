@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="it-card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body col-12 offset-md-1 col-md-10">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="it_input_login col">
                            
                            

                            <div class="it_icon_login">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>

                            <input id="email" type="email" class="it_input_field
                            @error('email') 
                                is-invalid 
                            @enderror" 
                            name="email" 
                            value="{{ old('email') }}" required 
                            autocomplete="email"
                            autofocus
                        >

                        @error('email')
                            <p class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                        </div>

                        <div class="it_input_login col">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="it_icon_login">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            </div>

                            <input id="password" 
                                type="password" 
                                class="it_input_field
                                @error('password') 
                                is-invalid 
                            @enderror" 
                            name="password" 
                            required autocomplete="current-password">

                            @error('password')
                                <p class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                
                                <label class="it-remember" for="remember">
                                    <input class="input_checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="it_checkmark"></span>
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex flex-column 
                        it-btn-login 
                        align-items-center">
                            <button type="submit">
                                {{ __('Login') }}
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
    Accedi
@endsection