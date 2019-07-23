@extends('layouts.master')
@section('content')
    <!--================End Top Header Area =================-->

    <!--================Menu Area =================-->
    <header class="shop_header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @foreach($categories as $cate)
                        @if($cate->childs->count()>0)

                            <ul class="navbar-nav">
                                <li class="nav-item dropdown submenu active">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $cate->catename }}<i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        @foreach($cate->childs as $child)
                                            <li class="nav-item"><a class="nav-link" href="{{ Route('cate_page', $child->id) }}">{{ $child->catename }}</a></li>
                                        @endforeach
                                    </ul>


                                </li>



                            </ul>
                        @endif
                    @endforeach
                </div>
            </nav>
        </div>
    </header>
    <!--================End Menu Area =================-->
    <!--================Slider Area =================-->
    <section class="main_slider_area">
        <div class="container">
            <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
                <ul>
                    <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/rebel.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="img/cuahang.jpg"  alt="" data-bgposition="center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>


                    </li>
                </ul>
            </div>
        </div>
    </section>
    @foreach($posts as $post)
    <section class="feature_product_area">
        <div class="container">
            <div class="f_p_inner">
                <div class="row">
                    <div class="col-lg-3">
                            <div class="s_m_title">
                                <h2>{!! $post->post_name !!}</h2>
                            </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="fillter_slider_inner">

                            <div class="fillter_slider owl-carousel">
                                @foreach($post->products as $product)

                                <div class="item shoes">
                                    <div class="fillter_product_item bags">
                                        <div class="f_p_img">
                                            <a href="{!! Route('product_page', $product->id) !!}"><img  src="/images/{!! $product->image !!}" alt=""></a>
                                        </div>
                                        <div class="f_p_text">
                                            <h5>{{ trans('messages.pdname')}}{!! $product->pdname !!}</h5>
                                            <h4>{{ trans('messages.price')}}{!! $product->price !!}</h4>
                                            <br>
                                            <a href="{!! Route('add_cart', $product->id) !!}" class="btn btn-success">{{ trans('messages.order')}}</a>
                                        </div>

                                </div>

                            </div>
                                @endforeach
                        </div>

                </div>
            </div>
        </div>
            </div>
        </div>
    </section>
    @endforeach

@endsection
