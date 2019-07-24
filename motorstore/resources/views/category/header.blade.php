<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{__('messages.name_store')}}</title>

    <!-- Icon css link -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
    <link href="/vendors/elegant-icon/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="header_top_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="top_header_left">
                    <a href="{!! Route('change_lang', ['en']) !!}"><img src="/img/icon/flag-1.png"></a>
                    <a href="{!! Route('change_lang', ['vi']) !!}"><img src="/img/icon/vietnam-flag.png"></a>
                    <a href="{!! Route('index') !!}">{{ trans('messages.homepage') }}</a>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="top_header_middle">
                    <a href="#"><i class="fa fa-phone"></i> Hot Line: <span>01686944444</span></a>
                    <a href="#"><i class="fa fa-envelope"></i> Email: <span>minhduc8120@gmail.com</span></a>
                    <img src="/img/13.png" alt="">
                </div>

            </div>
            <div class="col-lg-3">
                <div class="top_right_header">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <div class="top_right">
                                    <i class="icon-user icons">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <br>
                                        <br>
                                        <ul class="top_right">

                                            <li><a href="{!! Route('get_cart') !!}">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                                </a>
                                            </li>

                                        </ul>

                                        <ul class="dropdown-menu">
                                            @if (Auth::check() && Auth::user()->isAdmin == 1)
                                                <li>
                                                    <a href="{{ route('adminpage') }}">{{ trans('messages.adminpage') }}</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ route('user_page', Auth::user()->id) }}">{{ trans('messages.userinfo') }}</a>
                                                </li>
                                            @endif
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
                                    </i>
                                </div>
                            @else
                                <a href="{{ route('login') }}">{{ trans('messages.login')}}</a>
                                <a href="{{ route('register') }}">{{ trans('messages.register')}}</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
