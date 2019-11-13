@extends("layout.master")

@section("title","Admin Home Page")

@section('content')

    <div class="container my-5">
        <h1 class="text-info text-center mb-3">User Management</h1>

        <table class="table table-bordered">
            <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Create</th>
                <th scope="col">Permission</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if(count($user->roles->pluck("name")) > 0)
                            {{$user->roles->pluck("name")[0]}}
                        @else
                            <span class="text-secondary">No Role</span>
                        @endif
                    </td>
                    <td>{{$user->created_at->toFormattedDateString()}}</td>
                    <td><a href="{{url("admin/role/$user->id/add")}}" class="btn btn-success btn-sm">Permission
                            <i class="fa fa-plus"></i></a></td>
                    <td>
                        <a href="{{url("admin/user/$user->id/edit")}}" class="btn btn-warning btn-sm">Edit</a>
                        @if($user->deleted_at == null)
                            <a href="{{url("admin/user/$user->id/ban")}}" class="btn btn-danger btn-sm">Ban</a>
                        @else
                            <a href="{{url("admin/user/$user->id/ban")}}" class="btn btn-dark text-white btn-sm">Reactive</a>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection