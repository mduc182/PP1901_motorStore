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
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
    <link href="vendors/elegant-icon/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="vendors/revolution/css/navigation.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="header_top_area">
    <a href="{!! Route('change_lang', ['en']) !!}">English</a>
    <a href="{!! Route('change_lang', ['vi']) !!}">VietNam</a>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a class="btn btn-success" href="{!! Route('contact_page') !!}">{{ trans('messages.contactpage') }}</a>
            </div>
            <div class="col-lg-6">
                <div class="top_header_middle">
                    <a href="#"><i class="fa fa-phone"></i> Hot Line: <span>01686944444</span></a>
                    <a href="#"><i class="fa fa-envelope"></i> Email: <span>minhduc8120@gmail.com</span></a>
                    <img src="img/13.png" alt="">
                </div>
            </div>
            <div class="col-lg-3">

                <div class="top_right_header">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

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
                                </li>
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
@yield('content')
<script src="js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Rev slider js -->
<script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<!-- Extra plugin css -->
<script src="vendors/counterup/jquery.waypoints.min.js"></script>
<script src="vendors/counterup/jquery.counterup.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
<script src="vendors/image-dropdown/jquery.dd.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
<script src="vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
<script src="vendors/jquery-ui/jquery-ui.js"></script>

<script src="js/theme.js"></script>
</body>
<footer class="footer_area">
    <div class="container">
        <div class="footer_widgets">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-6">
                    <aside class="f_widget f_about_widget">
                        <img src="img/13.png" alt="">
                        <p>{{ trans('messages.introduce')}}</p>
                        <h6>Social:</h6>
                        <ul>
                            <li><a href="https://www.facebook.com/vinh.khoa.144"><i class="social_facebook"></i></a></li>
                            <li><a href="#"><i class="social_twitter"></i></a></li>
                            <li><a href="#"><i class="social_pinterest"></i></a></li>
                            <li><a href="#"><i class="social_instagram"></i></a></li>
                            <li><a href="#"><i class="social_youtube"></i></a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <aside class="f_widget link_widget f_info_widget">
                        <div class="f_w_title">
                            <h3>{{ trans('messages.information')}}</h3>
                        </div>
                        <ul>
                            <li><a href="#">32 Chùa Hà, Cầu Giấy, Hà Nội</a></li>
                            <li><a href="#">49 Ngọc Hồi , Hoàng Mai , Hà Nội</a></li>
                            <li><a href="#">88 Trần Quý Cáp, Đống Đa,Hà Nội</a></li>

                        </ul>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <aside class="f_widget link_widget f_service_widget">
                        <div class="f_w_title">
                            <h3>{{ trans('messages.sell')}}</h3>
                        </div>
                        <ul>
                            <li><a href="{!! Route('contact_page') !!}">Liên Lạc Tại Đây</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <aside class="f_widget link_widget f_extra_widget">
                        <div class="f_w_title">
                            <h3>{{ trans('messages.ophone')}}</h3>
                        </div>
                        <ul>
                            <li><a href="#">0386944444</a></li>
                            <li><a href="#">0976601017</a></li>
                            <li><a href="#">0963297787</a></li>

                        </ul>
                    </aside>
                </div>

            </div>
        </div>
        <div class="footer_copyright">
            <h5>© <script>document.write(new Date().getFullYear());</script> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">MinhDuc</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </h5>
        </div>
    </div>
</footer>