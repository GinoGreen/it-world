@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="it-card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="it_input">
                            
                            <div class="mail-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>

                            <div class="col-md-6">
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
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="it-password-wrapper form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="password-icon">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            </div>

                            <div class="col-md-6">
                                <input id="password" type="password" class="it-password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="it-remember form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="it-button-wrapper form-group row mb-0">
                            <div class="col-md-12 d-flex flex-column align-items-center">
                                <button type="submit" class="it-btn-login btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
    Accedi
@endsection