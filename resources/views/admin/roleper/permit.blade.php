@extends("layout.master")

@section("title","Admin Home Page")

@section('content')

    <div class="container my-5">
        <h1 class="text-info text-center mb-3">Add Permission For {{ucfirst($user->name)}}</h1>

        <div class="row">
            <div class="col-md-4 offset-md-1">
                <h3 class="text-center text-muted">Available Permissions</h3>
                <ul class="list-group">
                    @foreach($permissions as $permit)
                        @if(!$user->hasAnyPermission($permit->name))
                            <li class="list-group-item rounded-0">
                                <a href="#">{{$permit->name}}</a>
                                <a href="{{url("admin/permission/insert/$user->id/$permit->name")}}"><i
                                            class="fa fa-plus float-right"></i></a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 offset-md-1">
                <h3 class="text-center text-muted">{{ucfirst($user->name)}}'s Permissions</h3>
                <ul class="list-group">
                    @foreach($permissions as $permit)

                        @if($user->hasAnyPermission($permit->name))
                            <li class="list-group-item rounded-0">
                                <a href="#">{{$permit->name}}</a>
                                <a href="{{url("admin/permission/remove/$user->id/$permit->name")}}"><i class="fa fa-minus float-right"></i></a>

                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection