@extends("layout.master")

@section("title","Edit Role Page")

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    @foreach($permissions as $role)
                        <li class="list-group-item">{{$role->name}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h1 class="text-info text-center mb-3">Create New Tutorial</h1>
                <form method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control rounded-0" id="name" name="name" value="{{$permit->name}}">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm float-right">Update</button>
                    <button type="submit" class="btn btn-outline-warning btn-sm float-right mr-2">cancel</button>
                </form>
            </div>
        </div>
    </div>

@endsection