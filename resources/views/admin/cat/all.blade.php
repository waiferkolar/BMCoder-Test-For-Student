@extends("layout.master")

@section("title","Category Home Page")

@section('content')

    <div class="container my-5">
        <h1 class="text-info text-center mb-3">Category Management</h1>
        <a href="{{url("admin/cat/create")}}" class="btn btn-primary btn-sm mb-2">Create <i class="fa fa-plus"></i></a>
        <table class="table table-bordered">
            <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Parent</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cats as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>
                        @if($cat->is_parent == 0)
                            <a href="{{url("admin/cat/create/$cat->id")}}" class="btn btn-sm btn-primary">Add Sub
                                Cat</a>
                        @else
                            {{\App\Category::whereId($cat->is_parent)->first()->name}}
                        @endif

                    </td>
                    <td>{{$cat->created_at->toFormattedDateString()}}</td>
                    <td>
                        <a href="{{url("admin/cat/edit/$cat->id")}}" class="btn btn-warning btn-sm">Edit</a>
                        @if($cat->deleted_at == null)
                            <a href="{{url("admin/cat/delete/$cat->id")}}" class="btn btn-danger btn-sm">Delete</a>
                        @else
                            <a href="{{url("admin/cat/delete/$cat->id")}}"
                               class="btn btn-dark text-white btn-sm">Reactive</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection