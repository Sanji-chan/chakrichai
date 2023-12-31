@extends('layouts.app')


@section('content')
<div class="post-bg" style="background-color: #a5a4a423;">
    <div class="container">
   
        <div class="row mt-4">
            <div class="col-lg-12">
        


            <div class="card mb-4 mb-lg-0">
                <div class="row card-header m-2">
                    <div class="col-4 mt-1" style="display:inline-block">
                        <h4>Search Posts</h4>
                    </div>
                    
                    <form class="navbar-nav m-auto col-lg-3 " style="display:inline-block" method="GET" action="{{ url('posts/searchposts') }}">
                        @csrf
                            <div class="input-group">
                              <input type="text" name="searchposts" value= "{{ Request::get('searchposts') }}" class="form-control" style="border: None;" placeholder="Search for Job Post" aria-label="Search" aria-describedby="search-addon"/>
                              <button type="submit" class="border-0 btn" id="search-addon"><i class="fas fa-search" style="color: #eeaeca;"></i></button>
                            </div>
                    </form>
                    <div class="col-4 mt-2 m-auto " style="display: flex !important;">
                        <div class="sort  m-auto text-center me-2">
                            {{-- Sort by:  --}}
                             <span class="me-4">@sortablelink('created_at','Date')</span>

                             <span class="ms-4"> @sortablelink('price') </span>
                            
                        </div>
                             
                        {{-- <div class="sort  m-auto">
                           Filter by: 
                        </div> --}}
                        <ul class="nav-item dropdown  text-center m-auto ">
                          
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__("Tags")}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('posts.filter', 'Teaching') }}">
                                        {{ __('Teaching') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('posts.filter', 'Software Dev') }}">
                                        {{ __('Software Development') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('posts.filter', 'Graphics') }}">
                                        {{ __('Graphics') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('posts.filter', 'Digital Art') }}">
                                        {{ __('Digital Art') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('posts.filter', 'Mathematics') }}">
                                        {{ __('Mathematics') }}
                                    </a>
                                </div>
                        </ul>

                        <ul class="nav-item dropdown  m-auto ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__("Status")}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('posts.filter', 'active') }}">
                                        {{ __('Active') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('posts.filter', 'completed') }}">
                                        {{ __('Completed') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('posts.filter', 'pending') }}">
                                        {{ __('Pending') }}
                                    </a>
                                </div>
                        </ul>                             
                    </div>
                </div>

                <div class="card-body ">
        
                    @if ($searchPosts->isEmpty())
                        <p>No matches found.</p>
                    @else
                        <table  class="table align-middle mb-0 bg-white">
                            <thead>
                                <thead class="">
                                    <tr>
                                      <th>Title</th>
                                      <th>End Date</th>
                                      <th>Remuneration</th>
                                      <th>Tags</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                            </thead>
                            <tbody>
                                @foreach ($searchPosts as $post)
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
                                                    <a href="{{ route('posts.show', $post->slug) }}"> {{ $post->title }}</a>
                                                
                                                <p class="text-muted mb-0" style="font-size: 14px">Posted at: {{ $post->created_at }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"> {{ $post->end_date }} </p>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"> {{ $post->price }} Tk</p>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"> {{ $post->tag }} </p>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"> {{ $post->status }} </p>
                                        </td>
                                    
        
                                        <td>
                                            <a href="{{ route('posts.show', $post->slug) }}">View</a>
                                            
                                            @if (Auth::user()->id == $post->user_id)
                                            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-primary secondary-button">Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                
           </div>
    </div>
</div>
@endsection
