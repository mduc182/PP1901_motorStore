@extends('category.cate_display')
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                @if(isset($mess))
                    <p class="alert alert-success">{!! $mess !!}</p>
                @endif
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge"><a href="{!! Route('delete_cart', $product['item']['id']) !!}" type="button" class="btn btn-danger">Delete</a></span>
                            {{ trans('messages.pdname')}}<strong>{{ $product['item']['pdname'] }}</strong>
                            <br>
                            {{ trans('messages.price')}}<strong>{{ $product['price'] }}</strong>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>{{ trans('messages.total')}}{{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{!! Route('checkout') !!}" type="button" class="btn btn-success">{{ trans('messages.order')}}</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>{{ trans('messages.notfound')}}</h2>
            </div>
        </div>
    @endif
@endsection
