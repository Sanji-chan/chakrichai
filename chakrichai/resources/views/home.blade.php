@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

<section id="banner-bg" >
    <div class = "banner-overly">
         <div class="container">
             <div class="row">
                 <div class="col-lg-5 ml-auto banner-text">
                     <h1 class="text-left">Lorem, ipsum.</h1>
                     <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam, laborum?</p>
                 </div>
             </div>
         </div>
    </div>
 </section>

 <!--BANNER PART END-->


 <!--SERVICE PART START-->
 <section id="service-bg">
     <div class="container">
         <div class="row">
            
             <!--<div class="service-text"></div>-->
             
         </div>
     </div>
 </section>
 <!--SERVICE PART END-->

 <!--FEEDBACK PART START-->
 <section id="feedback-bg">
     <div class="container">
         <div class="row">
            
             <!--<div class="service-text"></div>-->
             
         </div>
     </div>
 </section>
 <!--FEEDBACK PART END-->



@endsection
