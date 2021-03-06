<header>
    <nav class="navbar navbar-expand-lg  navbar-fixed">
        <a class="navbar-brand ml-2" href="#"><img src="./images/logo_raw.png" alt="logo" height="50px" width="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ><i class="fas fa-hamburger fa-xs"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ml-auto">

                @auth
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                </li>
                @else
                <li class="nav-item mx-2">
                    <a href="{{ route('login') }}" class="nav-link btn btn-sm btn-outline-info">Login</a>
                </li>

                @if (Route::has('register'))
                <li class="nav-item mx-2">
                    <a href="{{ route('register') }}" class="nav-link btn btn-sm btn-outline-primary">Register</a>
                </li>
                @endif
                @endauth
            </ul>

        </div>
    </nav>
</header>


<div class="hero mb-3">

    <h3 class="text-center pt-5 text-white" style="padding-top:300px !important;">Welcome to our Blog site</h3>
</div>




