@extends('layouts.app')

@section('content')
<section class = "restpassword-bg">


<div class="container">
    <div class="row">
        <div class="m-auto col col-lg-8">  
            @include('layouts.flash_messages')
        </div>
    </div>
    <div class="row justify-content-md-center">
        
        <div class="resetpassword col-md-8">
            
            <div class="m-auto">
                <div class="content-header mb-4"><h4>{{ __('Reset Password') }}</h4></div>
                <div class="card-body">
                    

                    <form method="POST" action="{{ route('forgot.password.post') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="mb-2 m-auto btn-primary main-button btn-block">
                                    {{ __('Reset Password') }}
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
