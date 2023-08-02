@extends('layouts.app_dashboad')

@section('dashboard_content1')


            <div class="row">
                <div class="col-lg-12">



                    <div class="card mb-4 mb-lg-0">
                        <div class="card-header m-2">
                            <div class="col-4" style="display:inline-block">
                                <h4>All Complains</h4>
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
                                        <th>User</th>
                                        <th>Message</th>
                                        <th>Created At</th>
                                        <th>Action</th>
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
                                                <p class="fw-normal mb-1"> 
                                                    {{ $complain->user->name }}
                                                    <br> {{ $complain->email }}
                                                </p>
                                            </td>
                                            
                                            <td>
                                                <p style="overflow-wrap: anywhere;" class="fw-normal mb-1 overflow-hidden"> {{ $complain->message }} </p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1"> {{ $complain->created_at }} </p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1"> 
                                                    <form action="{{ route('complain.destroy', $complain->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class="btn btn-primary secondary-button" style="background: #eeaeca; border: 1px solid #eeaeca; color: #fff;">Delete</button>
                                                    </form>

                                                </p>
                                            </td>

                                        </tr>
                                        {{-- @endif --}}
                                    @endforeach
                                    </tbody>
                                </table>


                            <div class="row mt-2">
                                {{-- {{ $complains->links() }} --}}
                                <a href="{{ route("complain.index") }}">View all</a>

                            </div>

                            
                            @endif
                            
                        </div>

@endsection
