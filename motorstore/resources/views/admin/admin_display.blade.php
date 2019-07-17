<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('messages.name_store')}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <a href="{!! Route('change_lang', ['en']) !!}">English</a>
        <a href="{!! Route('change_lang', ['vi']) !!}">VietNam</a>
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ trans('messages.name_store')}}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">{{ trans('messages.login')}}</a></li>
                        <li><a href="{{ route('register') }}">{{ trans('messages.register')}}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ trans('messages.logout')}}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-lg-3">
            <h3 class="my-4">{{ trans('messages.managepages')}}</h3>
            <div class="list-group">
                <a href="{{ route('userpage')}}" class="list-group-item">{{ trans('messages.manageuser')}}</a>
                <a href="{{ route('catepage')}}" class="list-group-item">{{ trans('messages.managecate')}}</a>
                <a href="{{ route('productpage')}}" class="list-group-item">{{ trans('messages.manageproduct')}}</a>
                <a href="{{ route('post_page')}}" class="list-group-item">{{ trans('messages.managepost')}}</a>
                <a href="{{ route('branchpage')}}" class="list-group-item">{{ trans('messages.managebranch')}}</a>
                <a href="{{ route('orderpage')}}" class="list-group-item">{{ trans('messages.manageorder')}}</a>
                <a href="{{ route('contactpage')}}" class="list-group-item">{{ trans('messages.managecontact')}}</a>

            </div>
        </div>
        @yield('content')
</div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
