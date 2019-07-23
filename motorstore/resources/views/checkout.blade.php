@extends('category.cate_display')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            @if(isset($mess))
                <p class="alert alert-success">{!! $mess !!}</p>
            @endif
            <h1>{{ trans('messages.checkoutpage')}}</h1>
            <br>
            @foreach($products as $product)
            <h4>{{ trans('messages.pdname')}}{{ $product['item']['pdname'] }}</h4>
            <h4>{{ trans('messages.total')}}{{ $total }}</h4>
            @endforeach
            <br>
            <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                {{ Session::get('error') }}
            </div>
            <form action="{{ route('store_checkout') }}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">{{ trans('messages.username')}}</label>
                            <input type="text" id="name" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">{{ trans('messages.address')}}</label>
                            <input type="text" id="address" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">{{ trans('messages.phone')}}</label>
                            <input type="text" id="phone" class="form-control" name="phone">
                        </div>
                    </div>
                    <hr>

                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">{{ trans('messages.buy')}}</button>
            </form>
        </div>
    </div>
@endsection
