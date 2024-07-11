{{--<header>--}}
{{--    <nav>--}}
{{--        <ul>--}}
{{--            <li class="{{ Request::is('artists') ? 'active' : '' }}"><a href="/artists">Artists</a></li>--}}
{{--            <li class="{{ Request::is('albums') ? 'active' : '' }}"><a href="/albums">Albums</a></li>--}}
{{--            <li class="{{ Request::is('genres') ? 'active' : '' }}"><a href="/genres">Genre</a></li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--</header>--}}

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Sound Nafahat Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item {{ Request::is('tracks') ? 'active' : '' }}">
                    <a class="nav-link" href="/tracks">Tracks</a>
                </li>
                <li class="nav-item {{ Request::is('artists') ? 'active' : '' }}">
                    <a class="nav-link" href="/artists">Artists</a>
                </li>
                <li class="nav-item {{ Request::is('genres') ? 'active' : '' }}">
                    <a class="nav-link" href="/genres">Genres</a>
                </li>
                <li class="nav-item {{ Request::is('albums') ? 'active' : '' }}">
                    <a class="nav-link" href="/albums">Albums</a>
                </li>
                <li class="nav-item {{ Request::is('log') ? 'active' : '' }}">
                    <a class="nav-link" href="/log-viewer">Log</a>
                </li>
                <li class="nav-item {{ Request::is('visitors') ? 'active' : '' }}">
                    <a class="nav-link" href="/visitors">Visitors</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
