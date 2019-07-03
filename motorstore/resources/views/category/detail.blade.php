@extends('category.cate_display');
@section('content')
    <div class="row">
        <div class="col-md-6">
            <label>{{ trans('messages.pdname')}}</label>
            <input type="text" name="pdname" value="{!! $products->pdname !!}" class="form-control">
            <label>{{ trans('messages.plate')}}</label>
            <input type="text" name="plate" value="{!! $products->plate !!}" class="form-control">
            <label>{{ trans('messages.color')}}</label>
            <input type="text" name="color" value="{!! $products->color !!}" class="form-control">
            <label>{{ trans('messages.type')}}</label>
            <input type="text" name="type" value="{!! $products->type !!}" class="form-control">
            <label>{{ trans('messages.year')}}</label>
            <input type="text" name="year" value="{!! $products->year !!}" class="form-control">
            <label>{{ trans('messages.price')}}</label>
            <input type="text" name="price" value="{!! $products->price !!}" class="form-control">
            <label>{{ trans('messages.details')}}</label>
            <input type="text" name="detail" value="{!! $products->detail !!}" class="form-control">
        </div>
        <div class="col-md-6">
            <a href="{!! Route('product_page', $products->id) !!}"><img class="card-img-top"
                                                                        src="https://vn-test-11.slatic.net/p/8/xe-may-sh-mode-thoi-trang-trang-2017-smart-key-5673-7075394-12f70af9b6b57c7ce664c2966c941c82-catalog.jpg_340x340q80.jpg_.webp"
                                                                        alt=""></a>
            <br>
            <br>
            <br>
            <a class="btn btn-success">{{ trans('messages.order')}}</a>
        </div>
    </div>
@endsection
