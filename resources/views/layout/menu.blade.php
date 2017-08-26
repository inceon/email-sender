<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo">Email-Sender</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @if (Auth::check())
                @if (Auth::user()->hasRole('Admin'))
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="admin-dropdown">
                            Админка
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ url('/profile') }}">Профиль</a>
                </li>
                <li>
                    <a href="/logout">Выход</a>
                </li>
            @else
                <li class="{{ Menu::isActiveRoute('login') }}">
                    <a href="{{ url('/login') }}">Вход</a>
                </li>
                <li class="{{ Menu::isActiveRoute('register') }}">
                    <a href="{{ url('/register') }}">Регистрация</a>
                </li>
            @endif
        </ul>

        <!-- Dropdown Structure -->
        <ul id="admin-dropdown" class="dropdown-content">
            <li><a href="{{ route('admin.users') }}">Пользователи</a></li>
            <li><a href="#!">Емейлы</a></li>
        </ul>
    </div>
</nav>
