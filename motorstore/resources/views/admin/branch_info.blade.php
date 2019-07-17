@extends('admin.admin_display');
@section('content')
    <h2>{{ trans('messages.info1')}}{!! $branches->address !!}</h2>
    @foreach($branches->products as $product)
        <div id="card" class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img src="/images/{!! $product->image !!}" alt="" width="150px" height="150px"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">{{ trans('messages.pdname')}}{!! $product->pdname !!}</a>
                    </h4>
                    <h5>{{ trans('messages.plate')}}{!! $product->plate !!}</h5>
                    <h5>{{ trans('messages.color')}}{!! $product->color !!}</h5>
                    <h5>{{ trans('messages.price')}}{!! $product->price !!}</h5>
                    <h5>{{ trans('messages.year')}}{!! $product->year !!}</h5>
                    <h5>{{ trans('messages.detail')}}{!! $product->detail !!}</h5>
                </div>
            </div>
        </div>

    @endforeach
    {{ $products->links() }}

@endsection
