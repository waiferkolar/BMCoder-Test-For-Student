@extends("layout.master")

@section("title","Register To Be A User")

@section('content')

    <div class="container my-5">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mb-5 text-info">{{$user->name}} Edit</h2>

            @if($errors)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$error}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif

            <form method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Username</label>
                    <input class="form-control rounded-0" id="name" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control rounded-0" id="email" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control rounded-0" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>
                <button type="reset" class="btn btn-outline-warning btn-sm float-right mr-2">Cancel</button>
            </form>
        </div>
    </div>

@endsection