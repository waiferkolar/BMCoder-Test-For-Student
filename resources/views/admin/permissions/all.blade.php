@extends("layout.master")

@section("title","Tutorial Home Page")

@section('content')

    <div class="container my-5">
        <h1 class="text-info text-center mb-3">Role Management</h1>
        <a href="{{url("admin/permission/create")}}" class="btn btn-primary btn-sm mb-2">Create <i class="fa fa-plus"></i></a>
        <table class="table table-bordered">
            <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->created_at->toFormattedDateString()}}</td>
                    <td>
                        <a href="{{url("admin/permission/edit/$permission->id")}}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection