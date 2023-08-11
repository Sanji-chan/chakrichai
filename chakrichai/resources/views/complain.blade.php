@extends('layouts.app')


@section('content')
    
    <div class="post-bg" style="background-color: #a5a4a423;">
        <div class="container">
            @include('layouts.flash_messages')
            <div class="row mt-4">
                <div class="col-lg-12">



                    <div class="card mb-4 mb-lg-0">
                        <div class="card-header m-2">
                            <div class="col-4" style="display:inline-block">
                                <h4>All Complains</h4>
                            </div>

                            <div class="col-4 m-auto text-end" style="display:inline-block">
                                Sort by: @sortablelink('created_at','Date') @sortablelink('id', 'ID') @sortablelink('user_id', 'User') @sortablelink('complain_id', 'Complain ID')
                            </div>


                        </div>
                        <div class="card-body ">

                            @if ($complains->isEmpty())
                                <p>No complains found.</p>
                            @else
                                <table  class="table align-middle mb-0 bg-white">
                                    <thead>
                                    <thead class="">
                                    <tr>
                                        <th>Complain ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($complains as $complain)
                                        {{-- @if ($post->status != 'completed') --}}
                                        <tr>
                                            <td>
                                                <p class="fw-normal mb-1"> {{ $complain->complain_id }} </p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1"> {{ $complain->user->name }} </p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1"> {{ $complain->email }}</p>
                                            </td>
                                            <td>
                                                <p style="overflow-wrap: anywhere;" class="fw-normal mb-1 overflow-hidden"> {{ $complain->message }} </p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1"> {{ $complain->created_at }} </p>
                                            </td>

                                        </tr>
                                        {{-- @endif --}}
                                    @endforeach
                                    </tbody>
                                </table>


                            <div class="row text-end mt-3">
                                {{ $complains->links() }}
                            </div>

                            @endif

                        </div>
                    </div>
                </div>
@endsection
