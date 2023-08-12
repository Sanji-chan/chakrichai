
@extends('layouts.app')

@section('content')

<div class="post-bg" style="background-color: #a5a4a423;">

    <div class="container">
        @include('layouts.flash_messages')
        <div class="row mt-4">
            <div class="col-lg-12">

<div class="card mb-4 mt-3 mb-lg-0">
    <div class="card-header m-2"><h4>All applications sent to you</h4></div>
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
            <div class="row text-end mt-3">
                {!! $applications->links() !!}
            </div>
          
        @endif
    </div>
</div>   
</div>
</div>
</div>
</div>
@endsection
