@extends('category.cate_display');
@section('content')
    @foreach($categories->products as $product)
        <div id="card" class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top"
                                 src="https://vn-test-11.slatic.net/p/8/xe-may-sh-mode-thoi-trang-trang-2017-smart-key-5673-7075394-12f70af9b6b57c7ce664c2966c941c82-catalog.jpg_340x340q80.jpg_.webp"
                                 alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">{{ trans('messages.pdname')}}{!! $product -> pdname !!}</a>
                    </h4>
                    <h5>{{ trans('messages.plate')}}{!! $product -> plate !!}</h5>
                    <h5>{{ trans('messages.color')}}{!! $product -> color !!}</h5>
                    <h5>{{ trans('messages.price')}}{!! $product -> price !!}</h5>
                    <h5>{{ trans('messages.year')}}{!! $product -> year !!}</h5>
                    <h5>{{ trans('messages.detail')}}{!! $product -> detail !!}</h5>

                </div>
            </div>
        </div>
    @endforeach

@endsection
