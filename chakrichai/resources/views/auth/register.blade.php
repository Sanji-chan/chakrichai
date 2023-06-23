@extends('layouts.app')

@section('content')
{{-- This is the original content do not remove for now--}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
</div> --}}

<section class="register-bg">
    <div class="container">

        <div class="row justify-content-md-center" >
            <div class=" login col col-lg-10 d-flex" style="padding: 0">

                <div class="col col-lg-5 m-auto pb-4">
                    <div>
                        <h3 class="row-header mb-4 mt-4 text-center">Register Here</h3>
                    </div>
                    <form class= "col col-lg-10 m-auto" action = "#" method="post">
                        <!-- Email input -->
                        <div class="row mb-4">
                            <div class="col">
                              <div class="form-outline">
                                <input type="text" placeholder = "First name"  class="form-control" />
                                <!-- <label class="form-label" >First name</label> -->
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-outline">
                                <input type="text"  placeholder = "Last name" class="form-control" />
                                <!-- <label class="form-label" >Last name</label> -->
                              </div>
                            </div>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" placeholder="Email address" class="form-control" />
                            <!-- <label class="form-label">Email address</label> -->
                        </div>
                          
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                          <input type="password" placeholder="Password"  class="form-control" />
                          <!-- <label class="form-label">Password</label> -->
                        </div>


                        <!-- Submit button -->
                        <button type="submit" class="mb-2 m-auto btn-primary main-button btn-block">Sign up</button>
                    </form>

                   
                    <div class="text-center pb-4">

                        <!-- line -->
                        <div class="line"></div>
                    
                        <p>Or, Sign up using</p>
                        <a class="icon-btn mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="icon-btn mx-1">
                            <i class="fab fa-google"></i>
                        <a>

                        <a class="icon-btn mx-1">
                            <i class="fab fa-twitter"></i>
                        <a>

                        <a class="icon-btn mx-1">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
            </div>
            <div class="reg-text col col-lg-6" >
                <h3>
                    We'd love to have you work here.
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
                <!-- Register buttons -->
                <p>Already a member? </p>

                @if (Route::has('login'))
                <button type="submit" class="mb-2 btn-primary sec-button btn-block">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login here') }}</a>                
                </button>
                @endif

                </div>
            
        </div>
    </div>
</section>


@endsection
