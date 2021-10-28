<style>
    nav .nav-item {
        display: flex;
        align-items: center;
    }
</style>
<!-- Begin Nav
================================================== -->
<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container d-flex">
        <!-- Begin Logo -->
        <!-- End Logo -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!-- Begin Menu -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <img src="/img/logo/brand-zoom.png" alt="logo" width="50px">
                    </a>
                </li>
                <li class="nav-item @if($active == 'home') active @endif">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item @if($active == 'post') active @endif">
                    <a class="nav-link" href="/post">Post</a>
                </li>
                <li class="nav-item @if($active == 'author') active @endif">
                    <a class="nav-link" href="/author">Author</a>
                </li>
            </ul>
            <!-- End Menu -->
            <!-- Begin Search -->
            <form class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
                        <path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path>
                    </svg></span>
            </form>
            @if (Route::has('login'))
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth
            </ul>
            @endif
            <!-- End Search -->
        </div>
    </div>
</nav>
<!-- End Nav
================================================== -->