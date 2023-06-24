@extends('layouts.app')

@section('content')

{{-- This is the original content do not remove for now--}}
<section class = "login-bg"> 
<div class="container">

    <div class="row justify-content-md-center" >
        <div class=" login col col-lg-10 d-flex" style="padding: 0">
            <div class="login-text col col-md-6" >
                <h3>
                    Welcome back!
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
                <!-- Register buttons -->
                <p>Not a member? </p>

                @if (Route::has('register'))
                <button type="submit" class="mb-2 btn-primary sec-button btn-block">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register Here') }}</a>                
                </button>
                @endif


                </div>
            <div class="col col-md-5 m-auto pb-4">
                <div>
                    <h3 class="row-header mb-4 mt-4 text-center">Login Here</h3>

                </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col col-lg-10 m-auto">
                            <div class="form-outline mb-4">
                                <input id="email" type="email" placeholder = "Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col col-lg-10 m-auto">

                            <div class="form-outline mb-4">
                                <input id="password" placeholder = "Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--<div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>--}}
                    <button type="submit" class="mb-2 m-auto btn-primary main-button btn-block">Log in</button>
                    </form>
                    <div class="text-center pb-4">
                    <!-- Forgot Password -->
            
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    
                    <!-- line -->
                    <div class="line"></div>
                
                    <p>Or, Sign in here</p>
                    <a class="icon-btn mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="{{ route('googleAuth') }}" class="icon-btn mx-1">
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
            </div>
        </div>
    </div>
</div>
</section>


<section class = "login-bg"> 
<div class="container">

    <div class="row justify-content-md-center" >
        <div class=" login col col-lg-10 d-flex" style="padding: 0">
            <div class="login-text col col-md-6" >
                <h3>
                    Welcome back!
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
                <!-- Register buttons -->
                <p>Not a member? </p>

                @if (Route::has('register'))
                <button type="submit" class="mb-2 btn-primary sec-button btn-block">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register Here') }}</a>                
                </button>
                @endif


                </div>
            <div class="col col-md-5 m-auto pb-4">
                <div>
                    <h3 class="row-header mb-4 mt-4 text-center">Login Here</h3>

                </div>
                <form class= "col col-lg-10 m-auto" action = "#" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" placeholder="Email address" class="form-control" />
                        
                    </div>
                      
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" placeholder="Password"  class="form-control" />
                      
                    </div>


                    <!-- Submit button -->
                    <button type="submit" class="mb-2 m-auto btn-primary main-button btn-block">Sign in</button>
                </form>

               
                <div class="text-center pb-4">
                    <!-- Forgot Password -->
            
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    
                    <!-- line -->
                    <div class="line"></div>
                
                    <p>Or, Sign in here</p>
                    <a class="icon-btn mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="{{ route('googleAuth') }}" class="icon-btn mx-1">
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
        
    </div>
</div>
</div>
</section>


@endsection
