@extends("layout.master")

@section("title","Register To Be A User")

@section('content')

    <div class="container my-5">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mb-5 text-info">Create Category</h2>
            <form method="post">
                {{csrf_field()}}
                @if($cat->is_parent != 0)
                    <div class="form-group">
                        <label for="parent">Parent select</label>
                        <select class="form-control" id="parent" name="parent">
                            @foreach($cat_parents as $pp)
                                <option value="{{$pp->id}}" <?php echo $cat->is_parent == $pp->id ? "selected" : "";?>>{{$pp->name}}</option>
                            @endforeach

                        </select>
                    </div>
                @endif

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control rounded-0" id="name" name="name" value="{{$cat->name}}">
                </div>



                <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>
                <button type="reset" class="btn btn-outline-warning btn-sm float-right mr-2">Cancel</button>
            </form>
        </div>
    </div>

@endsection