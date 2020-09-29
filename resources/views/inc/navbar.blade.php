@if (Auth::check())
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="auth-nav">
        <a class="navbar-brand" href="/"><img style="height: 60px" src="/img/LaGomba_logo_transparent_bg.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/products">Products </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Blog </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#contact">Contact </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">Profile </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout </a>

                    </form>
                </li>

            </ul>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-opacity">
        <a class="navbar-brand" href="/"><img style="height: 60px" src="/img/LaGomba_logo_transparent_bg.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(Request::is('products') or Request::is('mushroom-details')) active @endif">
                    <a class="nav-link" href="/products">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if(Request::is('blog')) active @endif">
                    <a class="nav-link" href="/blog">Blog </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#contact">Contact </a>
                </li>
            </ul>
            <li style="color: rgba(0,0,0,.5);float: right; list-style-type: none;" class="nav-item @if(Request::is('login')) active @endif">
                <a class="nav-link" href="/login">Login </a>
            </li>
            <a id="register"  href="/register" class="btn btn-outline-success my-2 my-sm-0">Join us!</a>

        </div>
    </nav>
@endif
