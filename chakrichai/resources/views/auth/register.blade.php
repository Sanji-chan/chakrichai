@extends('layouts.app')

@section('content')
{{-- This is the original content do not remove for now--}}

<section class="register-bg">
    <div class="container">
        <div class="row justify-content-md-center" >
            <div class=" login col col-lg-10 d-flex" style="padding: 0">
                <div class="col col-lg-5 m-auto">
                    <div>
                        <h3 class="row-header mb-4 mt-4 text-center">Register Here</h3>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="col">
                            <div class="form-outline mb-4">
                                <input id="name" placeholder = "Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-outline mb-4">
                                <input id="email" placeholder = "Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                        
                            <div class="form-outline mb-4">
                                <input id="password" placeholder = "Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
</section>

@endsection
