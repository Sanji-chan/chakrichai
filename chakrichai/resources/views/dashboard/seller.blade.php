@extends('layouts\app_dashboad')


@section('dashboard_content1')

<div class="row">
    
    <div class="card mb-4 mb-lg-0">
        <div class="card-header m-2"><h4>Your applications</h4></div>
        <div class="card-body ">

            @if ($applications->isEmpty())
            <div class="empty_img img-fluid m-auto"></div>
            <p class="m-auto text-center">No applications found
                <br>
                <a class="m-auto text-center" href="{{ route("posts.index") }}">Find jobs</a>
            </p>
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
                                    <p class="fw-normal mb-1"> {{ $application->resume }} </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"> {{ $application->status }} </p>
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
                <a class="m-auto text-center" href="{{ route("posts.index") }}">Find jobs</a>
            @endif
        </div>
    </div>
</div>

@endsection
