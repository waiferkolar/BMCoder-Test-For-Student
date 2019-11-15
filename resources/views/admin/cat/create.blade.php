@extends("layout.master")

@section("title","Register To Be A User")

@section('content')

    <div class="container my-5">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mb-5 text-info">Create Category</h2>
            <form method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control rounded-0" id="name" name="name">
                </div>

                <input type="hidden" name="parent" value="
                @if($parent == 0)
                        0
                @else
                {{$parent}}
                @endif
                        ">

                <button type="submit" class="btn btn-primary btn-sm float-right">Create</button>
                <button type="reset" class="btn btn-outline-warning btn-sm float-right mr-2">Cancel</button>
            </form>
        </div>
    </div>

@endsection