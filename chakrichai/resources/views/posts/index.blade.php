@extends('layouts.app')


@section('content')
<div class="post-bg" style="background-color: #a5a4a423;">
    <div class="container">
   
        <div class="row mt-4">
            <div class="col-lg-12">
        


            <div class="card mb-4 mb-lg-0">
                <div class="card-header m-2">
                    <div class="col-4" style="display:inline-block">
                        <h4>All Posts</h4>
                    </div>
                    
                    <form class="navbar-nav m-auto col-lg-3 " style="display:inline-block" method="GET" action="{{ url('posts/searchposts') }}">
                        @csrf
                            <div class="input-group">
                              <input type="text" name="searchposts" value= "{{ Request::get('searchposts') }}" class="form-control" style="border: None;" placeholder="Search for Job Post" aria-label="Search" aria-describedby="search-addon"/>
                              <button type="submit" class="border-0 btn" id="search-addon"><i class="fas fa-search" style="color: #eeaeca;"></i></button>
                            </div>
                    </form>
                    <div class="col-4 m-auto text-end" style="display:inline-block">
                        Sort by: @sortablelink('created_at','Date') @sortablelink('price')                             
                    </div>
                
                
                </div>
                <div class="card-body ">
        
                    @if ($posts->isEmpty())
                        <p>No posts found.</p>
                    @else
                        <table  class="table align-middle mb-0 bg-white">
                            <thead>
                                <thead class="">
                                    <tr>
                                      <th>Title</th>
                                      <th>End Date</th>
                                      <th>Price</th>
                                      <th>Tags</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    {{-- @if ($post->status != 'completed') --}}
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
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if (Auth::user()->role == 'buyer')
                         <a href="{{ route('posts.create') }}">Create New Post</a>
                    @endif
                
           </div>
    </div>
</div>
@endsection
