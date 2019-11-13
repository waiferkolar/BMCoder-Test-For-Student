<div class="container-fluid bg-dark">
    <nav class="container navbar navbar-expand-lg navbar-light">
        <span>
            <i class="fa fa-list text-white mr-3 my_toggle_menu"></i>
        </span>
        <a class="navbar-brand text-white" href="#">
            <img src="{{asset("imgs/coder.png")}}" alt="" class="rounded" width="30" height="30">
            <span class="ml-2">BMCoder</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Category</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::check())
                           <i class="fa fa-users text-white"></i> {{ucfirst(Auth::user()->name)}}
                        @else
                            Member
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::check())
                            <a class="dropdown-item" href="{{url("logout")}}">Logout</a>
                        @else
                            <a class="dropdown-item" href="{{url("login")}}">Login</a>
                            <a class="dropdown-item" href="{{url("register")}}">Register</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>