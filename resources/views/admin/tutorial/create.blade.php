@extends("layout.master")

@section("title","Tutorial Home Page")

@section('content')

    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-info text-center mb-3">Create New Tutorial</h1>
            <form method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control rounded-0" id="title" name="title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="video_link">Video Link</label>
                    <textarea class="form-control" id="video_link" name="video_link" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-sm float-right">Creat</button>
                <button type="submit" class="btn btn-outline-warning btn-sm float-right mr-2">cancel</button>
            </form>
        </div>
    </div>

@endsection