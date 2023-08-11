@extends('layouts.app')

@section('content')

<section class="profile-bg" style="background-color: #a5a4a423;">
    <div class="container">
      

      <div class="row justify-content-start">
        @include('layouts.flash_messages')
        {{-- user image card --}}
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body m-auto text-center">
              {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid mt-3" style="width: 150px; border: 5px solid #a5a4a423;"> --}}
              <div class="user_img m-auto img-fluid"></div>
              <h5 class="mt-3">{{ $profile->name }}</h5>
              <p class="text-muted mb-1">
                @if ($profile->role == 1)
                    {{ __("Buyer") }} ({{ $profile->avg_rating }}/10)
                @elseif ($profile->role == 2)
                    {{ __("Seller") }} ({{ $profile->avg_rating }}/10)
                @else 
                    {{ __("Admin") }}
                @endif
              
              </p>
              <div class="d-flex justify-content-center mb-2">

                <a href="#">
                  @php
                    $chat_link = "http://127.0.0.1:8000/chatify/".$profile->user_id;   
                  @endphp
                    <button type="button" class="btn btn-primary" style="background: #eeaeca; border: 1px solid #eeaeca;"> <a href="{{ url($chat_link) }}" style="color: #fff !important; font-weight:400 !important;">Message</a></button>
                </a>

                @if(Auth::user()->id == $profile->user_id)
                <a href="{{ route('profile.edit', Auth::user()->id) }}">
                    <button type="button" class="ms-1 btn secondary-button" >Edit Profile</button>
                </a>
              @endif
              </div>
            </div>
          </div>

          {{-- user contact card --}}
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $profile->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $profile->contact }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $profile->address }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">DOB</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $profile->dob }}</p>
                </div>
              </div>


            </div>
          </div>

          <!-- Social media card-->
          <div class="card mb-4">
            
                <div class="card-body col-lg m-auto">
                    
                 <div class="text-center">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg" href="{{ $profile->facebooklink }}" target="_blank"  rel="noopener"  role="button">
                        <i class="text-center fab fa-facebook-f"></i>
                    </a>
            
                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg" href="{{ $profile->instagramlink }}" target="_blank"  rel="noopener"  role="button"> 
                        <i class=" text-center fab fa-instagram"></i>
                    </a>
            
                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg" href="{{ $profile->linkedinlink }}" target="_blank"  rel="noopener"  role="button">
                        <i class="text-center fab fa-linkedin"></i>
                    </a>
                    <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg" href="{{ $profile->githublink }}" target="_blank"  rel="noopener"  role="button">
                        <i class="text-center fab fa-github"></i>
                    </a>
                    
                </div>
 
            </div>
          </div>
        </div>

        <div class="col-lg-8">
            <div class="row mb-4 ">
                <div class="card mb-4 mb-lg-0">
                    <div class="card-header m-2 bg-light">
                        <div style="display:inline-block">
                            <h4 >Bio</h4>
                        </div>
                        @auth
                            @if ($profile->user_id === Auth::id())
                                <div style="display:inline-block">
                                    <a href="{{ route('profile.edit_bio', Auth::user()->id) }}"><i class="fas fa-edit"></i></a>
                                </div>  
                            @endif
                        @endauth
                        
                    </div>
                    <div class="card-body col justify-content-end ">
                        <p>{{ $profile->bio }}</p>
                       
                    </div>
                </div>
              </div>

              {{-- Add new content here if needed --}}
        </div>


      </div>
    </div>
  </section>

















@endsection