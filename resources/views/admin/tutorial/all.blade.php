@extends("layout.master")

@section("title","Tutorial Home Page")

@section('content')

    <div class="container my-5">
        <h1 class="text-info text-center mb-3">Tutorial Management</h1>
        <a href="{{url("admin/tut/create")}}" class="btn btn-primary btn-sm mb-2">Create <i class="fa fa-plus"></i></a>
        <table class="table table-bordered">
            <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Viddy</th>
                <th scope="col">Category</th>
                <th scope="col">Content</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tuts as $tut)
                <tr>
                    <td>{{$tut->id}}</td>
                    <td>{{$tut->title}}</td>
                    <td>
                        <div style="width:250px;height:150px">
                            {!! $tut->video_link !!}
                        </div>
                    </td>
                    <td>{{$tut->catname->name}}</td>
                    <td>{{substr($tut->content,0,30)}}</td>
                    <td>{{$tut->created_at->toFormattedDateString()}}</td>
                    <td>
                        <a href="{{url("admin/tut/edit/$tut->id")}}" class="btn btn-sm btn-warning">Edit</a>
                        @if($tut->deleted_at == null)
                        <a href="{{url("admin/tut/delete/$tut->id")}}" class="btn btn-sm btn-danger">Delete</a>
                            @else
                            <a href="{{url("admin/tut/delete/$tut->id")}}" class="btn btn-sm btn-dark">Reactive</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection