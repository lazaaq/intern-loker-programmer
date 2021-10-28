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
            @if (Route::has('login'))
            <ul class="navbar-nav ms-auto">
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