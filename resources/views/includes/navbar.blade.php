<header class="header">
    <div class="container container--narrow">
        <a href="/" class="header__logo">
            <img src="{{ asset('images/logo.svg') }}" alt="DevSearch Logo"/>
        </a>
        <nav class="header__nav">
            <input type="checkbox" id="responsive-menu"/>
            <label for="responsive-menu" class="toggle-menu">
                <span>Menu</span>
                <div class="toggle-menu__lines"></div>
            </label>
            <ul class="header__menu">
                <li class="header__menuItem"><a href="{{ route('index') }}">Developers</a></li>
                <li class="header__menuItem"><a href="{{ route('project.index') }}">Projects</a></li>
                @auth
                <li class="header__menuItem"><a href="inbox.html">Inbox</a></li>
                <li class="header__menuItem"><a href="{{ route('profile.show', Auth::user()->id) }}">My Account</a></li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn--sub">Logout</button>
                </form>
                    @else
                <li class="header__menuItem"><a href="{{ route('login') }}" class="btn btn--sub">Login/SignUp</a></li>
                @endauth
{{--                <li class="header__menuItem"><a href="{{ route('register') }}" class="btn btn--sub">SignUp</a></li>--}}
            </ul>
        </nav>
    </div>
</header>
