@extends("layouts.app");

@section("content")


    <div class="dashboard-bg"  style="background-color: #a5a4a423;">
        <div class="container">
            @include('layouts.flash_messages')
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header m-2"> 
                            <div class="row">
                                <h4 class="mt-1 col align-self-start">{{__('Users found on search: ')}}</h4>
                                <ul class="mt-2 col align-self-end text-end nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{__("Filter by rating")}}
                                    </a>
                                  
                                    <div class=" dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                   
                                        <a class="dropdown-item" name="filter" value = "1" href="{{ route('search.filter', 1) }}">
                                            {{ __('Top 3') }}
                                        </a>
                                      
                                        <a class="dropdown-item" name="filter" value = "2" href="{{ route('search.filter', 2) }}">
                                            {{ __('Top 10') }}
                                        </a>
                                     
                                        <a class="dropdown-item" name="filter" value = "3" href="{{ route('search.filter', 3) }}">
                                            {{ __('Last 3') }}
                                        </a>
                                    </div>
                                </ul>
                            </div>
                            
                        </div>
                        
                        <div class="card-body">
                            @if ($searchUsers->isNotEmpty())
                            <table class="table align-middle mb-0">
                                <thead class="">
                                  <tr>
                                    <th>Name</th>
                                    <th>Rating</th>
                                    <th>Role</th>
                                    <th>Position</th>
                                    <th>Education</th>
                                  </tr>
                                </thead>

                                @foreach($searchUsers as $users)
                                    @if ($users -> role != "0")
                                    <tbody>
                                    <tr>
                                        <td>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                                alt=""
                                                style="width: 45px; height: 45px"
                                                class="rounded-circle"
                                                />
                                            <div class="ms-3">
                                            <p class="fw-bold mb-1"><a href="{{ route('profile.show', $users->user_id ) }}">{{$users -> name}}</a></p>
                                            <p class="text-muted mb-0">{{ $users -> email }}</p>
                                            </div>
                                        </div>
                                        </td>
                                        <td>
                                            {{ $users -> avg_rating}}
                                        </td>
                                        <td>
                                        <p class="fw-normal mb-1">
                                        @if ($users -> role == "1")
                                            Buyer
                                        @else
                                            Seller
                                        @endif
                                        </p>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"> {{$users -> position}}</p>
                                           
                                        </td>
                                        <td>{{$users -> education}}</td>
                                      
                                    </tr>
      
                                </tbody>
                            @endif
                            @endforeach
                            </table>
                             
                        @else
                        <div class = "col-md-6 m-auto">
                            <div class="empty_img img-fluid m-auto"></div>
                            <p class="m-auto text-center">No matches found</p>
                        </div>
                        @endif 
                            
    
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection 