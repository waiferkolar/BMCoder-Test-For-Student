@extends("layout.master")

@section("title","Admin Home Page")

@section('content')

    <div class="container my-5">
        <h1 class="text-info text-center mb-3">Add Role For {{ucfirst($user->name)}}</h1>

        <div class="row">
            <div class="col-md-4 offset-md-1">
                <h3 class="text-center text-muted">Available Roles</h3>
                <ul class="list-group">
                    @foreach($roles as $role)
                        @if(!$user->hasRole($role->name))
                            <li class="list-group-item rounded-0">
                                <a href="#">{{$role->name}}</a>
                                <a href="{{url("admin/role/insert/$user->id/$role->name")}}" class="float-right"><i
                                            class="fa fa-plus text-success"></i></a>
                            </li>
                        @endif

                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 offset-md-1">
                <h3 class="text-center text-muted">{{ucfirst($user->name)}}'s Permissions</h3>
                <ul class="list-group">
                    @foreach($roles as $role)
                        @if($user->hasRole($role->name))
                            <li class="list-group-item rounded-0">
                                <a href="#">{{$role->name}}</a>
                                <a href="{{url("admin/role/remove/$user->id/$role->name")}}" class="float-right"><i class="fa fa-minus text-danger"></i></a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection