@extends('category.cate_display');
@section('content')
    <br>
    <br>
    <br>
    <br>
    @foreach($categories->products as $product)
        <div class="col-lg-14 float-md-right">
            <div class="c_product_grid_details">
                <div class="c_product_item">
                    <div class="row">
                        <div class="col-lg-3 col-md-offset-1 ">
                            <div class="c_product_img">
                                <a href="{!! Route('product_page', $product->id) !!}"><img class="img-fluid" src="/images/{!! $product->image !!}" alt="" width="300px" height="300px" ></a>
                            </div>

                        </div>
                        <div class="col-lg-8 col-md-6">
                            <div class="c_product_text">
                                <h3> <a href="{!! Route('product_page', $product->id) !!}">{{ trans('messages.pdname')}}{!! $product -> pdname !!}</a></h3>
                                <span><h4>{{ trans('messages.price')}}{!! $product -> price !!}</h4></span>
                                <span><h4>{{ trans('messages.color')}}{!! $product -> color !!}</h4></span>
                                <span><h4>{{ trans('messages.year')}}{!! $product -> year !!}</h4></span>
                                <span><h4>{{ trans('messages.detail')}}{!! $product -> detail !!}</h4></span>
                                <br>
                                <a class="btn btn-info" href="{!! Route('product_page', $product->id) !!}">{{ trans('messages.details')}}</a></li>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
