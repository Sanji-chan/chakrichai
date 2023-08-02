@extends('layouts.app')

@section('content')

<section id="banner-bg" >
    <div class = "banner-overly">
         <div class="container">
             <div class="row">
                 <div class="col-lg-5 ml-auto banner-text">
                     <h1 class="text-left">Need a job?</h1>
                     <p>Look no further because, Chakrichai brings you the opportunities you are looking for.</p>
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
            <div class="col-lg-12 m-auto row-header">
                Services
            </div>
         </div>
         <div class="row row-cols-1 row-cols-md-3 g-4 ">
            <div class="col-lg-3">
                <div class="card bg-light h-100">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers"/>
                    <div class="card-body ">
                      <h5 class="card-title  content-header"> Lorem ipsum </h5>
                      <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ea vel soluta?
                      </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-light h-100">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers"/>
                    <div class="card-body ">
                      <h5 class="card-title content-header"> Lorem ipsum </h5>
                      <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ea vel soluta?
                      </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-light h-100">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers"/>
                    <div class="card-body ">
                      <h5 class="card-title content-header"> Lorem ipsum </h5>
                      <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ea vel soluta?
                      </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-light h-100">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers"/>
                    <div class="card-body ">
                      <h5 class="card-title content-header"> Lorem ipsum </h5>
                      <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ea vel soluta?
                      </p>
                    </div>
                </div>
            </div>


         </div>
     </div>
 </section>
 <!--SERVICE PART END-->

 <!--FEEDBACK PART START-->
 <section id="feedback-bg">
     <div class="container-fluid">
        <div class="row">

        </div>
         <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="row-header text-center">Found an issue?</div>
                <div class=" banner2-bg"></div>
            </div>
            <div class="col-lg-4 m-auto">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @php
                        session()->forget('success');
                    @endphp
                @endif
                <div class="row-header">
                    <h3>
                        Leave a message
                    </h3>
                </div>
                <form action="{{ route('complain.store') }}" method="POST">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" name="email" placeholder="Email address" class="form-control" required />
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                      <textarea name="message" class="form-control"  placeholder="Message" rows="2" required></textarea>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary main-button btn-block mb-4 ">Send</button>
                  </form>
            </div>

         </div>
     </div>
 </section>
 <!--FEEDBACK PART END-->

@endsection
