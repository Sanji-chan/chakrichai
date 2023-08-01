@extends("layouts.app");

@section("content")


    <div class="dashboard-bg"  style="background-color: #a5a4a423;">
        <div class="container">
            @include('layouts.flash_messages')
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header m-2"> <h4>{{__('Users found on search: ')}}</h4></div>
        
                        <div class="card-body">
                            @if ($searchUsers->isNotEmpty())
                            <table class="table align-middle mb-0">
                                <thead class="">
                                  <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Position</th>
                                    <th>Education</th>
                                    {{-- <th>Actions</th> --}}
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
                                            <p class="fw-bold mb-1">{{$users -> name}}</p>
                                            <p class="text-muted mb-0">{{ $users -> email }}</p>
                                            </div>
                                        </div>
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