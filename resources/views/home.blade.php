@extends("layout.master")

@section("title","BM Home Page")

@section('content')

    <div class="container">
        <div class="row">
            {{--Single Tutorial Start --}}
            @foreach($tuts as $tut)
                @foreach($permits as $permit)
                    @if($permit->id == $tut->permit)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-img-top text-center">
                                    {!! $tut->video_link !!}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$tut->title}}</h5>
                                    <p class="card-text">{{substr($tut->content,0,30)}}</p>
                                    <a href="#" class="btn btn-info btn-sm float-right">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
            {{--Single Tutorial End --}}
        </div>
    </div>

@endsection