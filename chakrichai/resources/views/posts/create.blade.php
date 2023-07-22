@extends('layouts.app')


@section('content')
<div class="post-bg">
    <div class="container">
   
        <div class="row mt-4">
            <div class="col-lg-10 m-auto">
        
            
            <div class="card mb-4 mb-lg-0">
                <div class="card-header m-2"><h4>Create New Post</h4></div>
            
                    
                <div class="card-body form-group col justify-content-center ">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                
                        <div>
                            <label for="title">Title</label>
                            <input  class="form-control mb-3" type="text" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                
                        <div>
                            <label for="details">Job details</label>
                            <textarea  class="form-control mb-3"  id="details" name="details" rows='8' required>{{ old('details') }}</textarea>
                        </div>
                
                        <div>
                            <label for="tag">Category</label>
                            <select  class="form-control mb-3" id="tag" name="tag" required>
                                <option value="N/A" {{ old('status') === 'N/A' ? 'selected' : '' }}>N/A</option>
                                <option value="teaching" {{ old('status') === 'teaching' ? 'selected' : '' }}>Teaching</option>
                                <option value="software_dev" {{ old('status') === 'software_dev' ? 'selected' : '' }}>Software Development</option>
                                <option value="graphics" {{ old('status') === 'graphics' ? 'selected' : '' }}>Computer Graphics</option>
                                <option value="digital_art" {{ old('status') === 'digital_art' ? 'selected' : '' }}>Digital Art</option>
                            </select>
                        </div>
                
                        <div>
                            <label for="date">Due Date</label>
                            <input  class="form-control mb-3" type="date" id="date" name="date" value="{{ old('date') }}" required>
                        </div>
                
                        <div>
                            <label for="price">Price</label>
                            <input  class="form-control mb-3" type="number" id="price" name="price" step="0.01" value="{{ old('price') }}">
                        </div>
                
                        <div>
                            <label for="status">Status</label>
                            <select  class="form-control mb-3" id="status" name="status" required>
                                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="completed" {{ old('status') === 'complete' ? 'selected' : '' }}>Completed</option>
                                <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                
                        <div>
                            <label for="photo">Photo</label>
                            <input  class="form-control mb-3" type="file" id="photo" name="photo">
                        </div>
                
                        <button type="submit" class="btn btn-primary main-button">Create</button>
                    </form>
               
                </div>
            </div>
</div>
@endsection
