<<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- [headの内容] -->
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <!-- [ナビゲーションバーのその他のコンテンツ] -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- [左側ナビゲーションの内容、存在する場合] -->
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav">
                            <!-- 認証リンク -->
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('messages.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- [メインコンテンツ] -->
        </div>
    </body>
</html>
