@extends("layouts.app");

@section("content")

<div class = "py-5">
    <div class = "container">
        <div class = "row">
        @foreach($searchUsers as $users)
        @if ($users -> role != "0")
        <div class = "col-md-3">
            <div class = "product card">
                    Name: {{$users -> name}}
                    <br></br>
                    @if ($users -> role == "1")
                        Role: Buyer
                    @else
                        Role: Seller
                    @endif
                    <br></br>
                    Position: {{$users -> position}}
                    <br></br>
                    Education: {{$users -> education}}
                    
            </div>
        </div>
        @endif
        @endforeach
        </div>
    </div>
</div>

@endsection 