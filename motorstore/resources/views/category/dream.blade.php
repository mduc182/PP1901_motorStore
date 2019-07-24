@include('category.header')
<!--================End Categories Banner Area =================-->

<!--================Categories Product Area =================-->
<br>
<br>
<br>
<div class="top_header_middle"><h3>{{ trans('messages.pdpa')}}{!! $categories->catename !!}</h3></div>
<section class="categories_product_main p_80">
    <div class="container">
        <div class="categories_main_inner">
            <div class="row row_disable">
                <div class="col-lg-9">
                    @foreach($categories->products as $product)
                    <div class="c_product_grid_details">
                        <div class="c_product_item">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <br>
                                    <div class="c_product_img">

                                        <a href="{!! Route('product_page', $product->id) !!}"><img  class="img-fluid" src="/images/{!! $product->image !!}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <div class="c_product_text">
                                        <br>
                                        <h3><a href="{!! Route('product_page', $product->id) !!}">{{ trans('messages.pdname')}}{!! $product -> pdname !!}</a></h3>
                                        <h5>{!! $product -> price !!}</h5>
                                        <h6>{{ trans('messages.color')}}{!! $product -> color !!}</h6>
                                        <h6>{{ trans('messages.year')}}{!! $product -> year !!}</h6>
                                        <p>{!! $product -> detail !!}</p>
                                        <ul class="c_product_btn">
                                            <li><a class="add_cart_btn" href="{!! Route('add_cart', $product->id) !!}">{{ trans('messages.order')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                        @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@include('category.footer')
@include('category.bottom_asset')
