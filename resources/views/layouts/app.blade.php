<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Styles --}}
        <script src="https://use.fontawesome.com/2ae53ff47d.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        {{-- Branding Image --}}
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        {{-- Left Side Of Navbar --}}
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('petition.start') }}"><span class="fa fa-plus" aria-hidden="true"></span> @lang('navbar.start-petition') </a></li>
                            <li><a href="{{ route('petition.browse') }}"><span class="fa fa-list" aria-hidden="true"></span> @lang('navbar.petition-browse') </a></li>
                            <li><a href="{{ route('petition.search') }}"><span class="fa fa-search" aria-hidden="true"></span> @lang('navbar.petition-search') </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-flag"></span> Language: English</a>

                                <ul class="dropdown-menu">
                                    <li><a href="">English</a></li>
                                    <li><a href="">Dutch</a></li>
                                    <li><a href="">French</a></li>
                                </ul>
                            </li>
                        </ul>

                        {{-- Right Side Of Navbar --}}
                        <ul class="nav navbar-nav navbar-right">
                            {{-- Authentication Links --}}
                            @if (Auth::guest())
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-sign-in" aria-hidden="true"></span> Login</a>
                                    <ul id="login-dp" class="dropdown-menu">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @lang('navbar.login-via')
                                                    <div class="social-buttons">
                                                        <a href="{{ route('auth.social', ['provider' => 'facebook']) }}" class="btn btn-fb"><i class="fa fa-facebook"></i> @lang('navbar.brand-facebook') </a>
                                                        <a href="{{ route('auth.social', ['provider' => 'twitter']) }}" class="btn btn-tw"><i class="fa fa-twitter"></i> @lang('navbar.brand-twitter') </a>
                                                    </div>
                                                    @lang('navbar.login-or')
                                                    <form class="form" role="form" method="post" action="{{ url('login') }}" accept-charset="UTF-8" id="login-nav">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label class="sr-only" for="exampleInputEmail2"> @lang('navbar.auth-email') </label>
                                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="@lang('navbar.placeholder-email')" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="sr-only" for="exampleInputPassword2">@lang('navbar.auth-password')</label>
                                                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="@lang('navbar.placeholder-password')" required>
                                                            <div class="help-block text-right"><a href=""> @lang('navbar.forgot-password')</a></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-block"> @lang('auth.sign-in') </button>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox"> @lang('navbar.keep-logged-in') </label>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="bottom text-center">
                                                    @lang('navbar.auth-new') <a href="{{ route('register') }}"><b> @lang('navbar.auth-register') </b></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="">
                                        <span class="fa fa-bell-o" aria-hidden="true"></span>
                                        <span class="badge">0</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('profile') }}"><span class="fa fa-users" aria-hidden="true"></span> @lang('navbar.profile') </a></li>
                                        <li><a href="{{ route('profile.settings') }}"><span class="fa fa-wrench" aria-hidden="true"></span> @lang('navbar.account-settings') </a></li>
                                        <li><a href="{{ route('profile.petitions') }}"><span class="fa fa-list" aria-hidden="true"></span> @lang('navbar.user-petitions') </a></li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                <span class="fa fa-sign-out" aria-hidden="true"></span> @lang('navbar.logout')
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
                @yield('content')
            </div>
        </div>

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
