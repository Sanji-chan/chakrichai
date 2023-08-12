@extends('layouts.app_dashboad')


@section('dashboard_content1')

<div class="row">

    <div class="card mb-4 mb-lg-0">
        <div class="card-header m-2"><h4>Your Recent Posts</h4></div>
        <div class="card-body ">

            @if ($posts->isEmpty())
            <div class="empty_img img-fluid m-auto"></div>
            <p class="m-auto text-center">No posts found.
                <br>
                <a class="m-auto text-center" href="{{ route('posts.create')  }}">Create a job</a>
            </p>
            @else

                <table  class="table align-middle mb-0">
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
                        @foreach ($posts as $post)
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
                                            <a href="#"> <p class="fw-bold mb-1">{{ $post->title }}</p></a>

                                        <p class="text-muted mb-0">{{ $post->created_at }}</p>
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
                                    <a href="{{ route( 'posts.edit', $post->id) }}">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf

                                        @method('DELETE')
                                        <button type="submit"  class="btn btn-primary secondary-button" style="background: #eeaeca; border: 1px solid #eeaeca; color: #fff;">Delete</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                
                    <form class="col mt-3"  action="{{ route('posts.create') }}">
                        <div class="">
                            <a href="#"><button  class="btn btn-primary secondary-button" >Create New Post</button></a>
                        </div>
                    </form>
                    
                    {{-- <div class="col text-end mt-4">
                        {!! $posts->links() !!}
                    </div> --}}
                </div>
            @endif

           
        </div>
    </div>


    <div class="card mb-4 mt-3 mb-lg-0">
        <div class="card-header m-2"><h4>Applicants</h4></div>
        <div class="card-body ">

            @if ($applications->isEmpty())
            <div class="empty_img img-fluid m-auto"></div>
            <p class="m-auto text-center">No applications found</p>
            @else
                <table  class="table align-middle mb-0">
                    <thead>
                        <thead class="">
                            <tr>
                              <th>Name</th>
                              <th>Applied to</th>
                              <th>Resume</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
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
                                            <a href="#"> <p class="fw-bold mb-1">{{ $application->name }}</p></a>

                                        <p class="text-muted mb-0">{{ $application->Uni_name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"> {{ $application->post_id }} </p>
                                </td>
                                <td>
                                @if($application->resume)
                                   <a href="{{route('applications.getresume', $application->resume) }}" target="_blank"  rel="noopener" method="GET">{{ $application->resume }}</a>
                                @endif
                                </td>
                                <td>
                                    <form action= "{{ route('applications.updatestatus', $application->id) }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <select  class="form-control mb-1" id="status" name="status"  required>
                                            <option value="N/A"  hidden>{{ $application->status  }}</option>

                                            <option value="Pending">Pending</option>
                                            <option value="Accepted">Accepted</option>
                                            <option value="Rejected">Rejected</option>
                                        </select>
                                        <button type="submit" class="mb-1 ps-2 text-muted" style="text-decoration:None; background:None; border: None; padding: None;">  Change status </button>
                                    </form>
                                </td>


                             <td>
                                    <a href="{{ route('applications.show', $application->slug) }}">View</a>
                                    {{-- @if (Auth::user()->id == $post->user_id) --}}
                                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  class="btn btn-primary secondary-button" style="background: #eeaeca; border: 1px solid #eeaeca; color: #fff;">Delete</button>
                                    </form>
                                    {{-- @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col mt-3">
                        <form action="{{ route('applications.index')  }}" method="GET">
                            @csrf
                            <button type="submit"  class="btn btn-primary secondary-button" >View All</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection

