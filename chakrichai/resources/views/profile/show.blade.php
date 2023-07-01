@extends('layouts.app')

@section('content')

<section class="profile-bg" style="background-color: #a5a4a423;">
    <div class="container">
      <div class="row">

        {{-- user image card --}}
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid mt-3" style="width: 150px; border: 5px solid #a5a4a423;">
              <h5 class="mt-3">{{ $profile->user_name }}</h5>
              <p class="text-muted mb-1">{{ $profile->position }}</p>
              <div class="d-flex justify-content-center mb-2">
                <a href="{{ route('profile.edit') }}">
                    <button type="button" class="btn btn-primary" style="background: #eeaeca; border: 1px solid #eeaeca;">Edit Profile</button>
                </a>
                <a href="#">
                    <button type="button" class="btn secondary-button ms-1">Message</button>
                </a>
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
                  <p class="text-muted mb-0">example@example.com</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">(097) 234-5678</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Social media card-->
          <div class="card mb-4">
            <div class="card-body col-lg m-auto">
                 
                 <div class="text-center">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                        <i class="text-center fab fa-facebook-f"></i>
                    </a>
            
                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                    <i class="text-center fab fa-twitter"></i> 
                    </a>
            
                    <!-- Google -->
                    <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                        <i class="text-center fab fa-google"></i>
                    </a>
            
                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg" href="#!" role="button"> 
                        <i class=" text-center fab fa-instagram"></i>
                    </a>
            
                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                        <i class="text-center fab fa-linkedin"></i>
                    </a>
                    <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
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
                                {{-- <a href="{{ route('profile.edit') }}">Edit Profile</a> --}}
                                <div style="display:inline-block">
                                    <a href="#"><i class="fas fa-edit"></i></a>
                                </div>  
                            @endif
                        @endauth
                        
                    </div>
                    <div class="card-body col justify-content-end ">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident dolorem assumenda quis possimus ipsa accusantium ab, magni soluta vel officia quos sit. Ipsam perferendis soluta possimus aperiam laboriosam cupiditate quod.</p>
                        {{-- <form action="#">
                            <div class="">
                                <input type="search" class="form-control mb-2 rounded" placeholder="Post a job request..." aria-label="Post" aria-describedby="post-addon"/>
                                <a href="#"><button class="btn btn-primary">Post</button></a>
                            </div>
                        </form> --}}
                    </div>
                </div>
              </div>
          <div class="row">
            <div class="card mb-4 mb-lg-0">
                <div class="card-header m-2 bg-light"><h4>Post/Find a job section</h4></div>
                <div class="card-body col justify-content-end ">
                    <form action="#">
                        <div class="">
                            <textarea class="form-control mb-2 rounded "  placeholder="Post a job request..." rows="3"></textarea>
                            {{-- <input type="search" class="form-control mb-2 rounded" rows="3" placeholder="Post a job request..." aria-label="Post" aria-describedby="post-addon"/> --}}
                            <a href="#"><button class="btn btn-primary secondary-button" >Post</button></a>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>

















@endsection