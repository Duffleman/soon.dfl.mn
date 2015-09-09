<nav class="navbar navbar-light bg-faded">
    <a href="/" class="navbar-brand">DFL\Soon</a>
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a href="/" class="nav-link @if(\Request::is('/')) active @endif">Timers</a>
        </li>
        <li class="nav-item">
            @if(Auth::check())
                <a class="nav-link" href="/auth/logout">Logout</a>
            @else
                <a class="nav-link @if(\Request::is('auth/login')) active @endif" href="/auth/login">Login</a>
            @endif
        </li>
    </ul>
    @if(Auth::check())
        <form class="form-inline navbar-form pull-right" action="/timers" method="POST">
            {!! csrf_field() !!}
            <input class="form-control" type="text" name="title" id="title" placeholder="Title">
            <input class="form-control" type="datetime-local" name="time" id="time" placeholder="Time">
            <button class="btn btn-success-outline" type="submit">Add</button>
        </form>
    @endif
</nav>