@extends('layouts.app')


@section('content')
<div class="post-bg" style="background-color: #a5a4a423;">
    <div class="container">
        
   
        <div class="row mt-4">
            <div class="col-lg-8 m-auto">
            @include('layouts.flash_messages')
        
            
            <div class="card mb-4 mb-lg-0">
                <div class="card-header m-2"><h4>Apply to post</h4></div>
            
                    
                <div class="card-body form-group col justify-content-center ">
                    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_id" value={{ $request->post_id }}>

                        <div>
                            <label for="name">Name</label>
                            <input  class="form-control mb-3" type="text" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                
                        <div>
                            <label for="uni_name">University name</label>
                            <input  class="form-control mb-3"  id="uni_name" name="uni_name" required>
                        </div>

                        <div>
                            <label for="semester">Semester</label>
                            <input  class="form-control mb-3" type="number"  id="semester" name="semester">
                        </div>

                        <div>
                            <label for="age">Age</label>
                            <input  class="form-control mb-3"  id="age" name="age">
                        </div>


                        <div>
                            <label for="major">Major</label>
                            <select  class="form-control mb-3" id="major" name="major" required>
                                <option value="N/A" {{ old('status') === 'N/A' ? 'selected' : '' }}>N/A</option>
                                <option value="Computer Science" {{ old('status') === 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                                <option value="Software Development" {{ old('status') === 'Software Development' ? 'selected' : '' }}>Software Development</option>
                                <option value="Computer Graphics" {{ old('status') === 'Computer Graphics' ? 'selected' : '' }}>Computer Graphics</option>
                                <option value="Digital Art" {{ old('status') === 'Digital Art' ? 'selected' : '' }}>Digital Art</option>
                                <option value="Mathematics" {{ old('status') === 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                            </select>
                        </div>
                
                
                        <div>
                            <label for="resume">Upload cv/resume</label>
                            <input  class="form-control mb-3" type="file" id="resume" name="resume">
                        </div>
                
                        <button type="submit" class="btn btn-primary main-button">Submit Application</button>
                    </form>
               
                </div>
            </div>
</div>
@endsection
