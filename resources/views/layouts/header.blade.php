<div class="header navbar navbar-expand-sm container-fluid">
    <div class="row block-header">
        <div class="header-left col-xl-4 justify-content-xl-start block-left">
            <button class="header-button navbar-toggler block-btn" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars icon"></span>
            </button>
            <img class="img-logo img-fluid d-flex mx-auto ml-xl-2" src="image/Hapo_Learn.png" alt="">
        </div>
        <div class="header-right collapse navbar-collapse col-xl-8 justify-content-xl-end justify-content-md-center" id="navbarNav">
            <ul class="menu navbar-nav mr-xl-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('home') }}">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">all courses</a>
                </li>
                @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="#">profile</a>
                </li>
                <li class="nav-item logout">
                    <a class="nav-link" href="#">
                        <form action="{{ route('logout') }}" method="post" class="form-logout">
                            @csrf
                            <input type="submit" class="d-none">logout
                        </form>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#signModal">login/register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>

@include('auth.login-register')
