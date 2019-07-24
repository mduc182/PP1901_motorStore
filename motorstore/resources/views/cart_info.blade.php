@include('category.header')
<section class="shopping_cart_area p_100">
    <div class="container">
        @if(Session::has('cart'))
        <div class="row">
            <div class="col-lg-8">
                <div class="cart_items">
                    <h3>{{ trans('messages.cartitems')}}</h3>
                    <div class="table-responsive-md">
                        @foreach($products as $product)
                        <table class="table">
                            <tbody>

                            <tr>
                                <th scope="row">
                                    <span class="badge"><a href="{!! Route('delete_cart', $product['item']['id']) !!}" type="button" class="btn btn-danger">Delete</a></span>
                                </th>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="/images/{!! $product['item']['image'] !!}" alt="" width="200px" height="200px">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{ trans('messages.pdname')}}<strong>{{ $product['item']['pdname'] }}</strong>  </h4>
                                        </div>
                                    </div>
                                </td>
                                <td><p>{{ trans('messages.price')}}{{ $product['price'] }}</p></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                </th>
                            </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart_totals_area">
                    <h4>{{ trans('messages.carttotal')}}</h4>
                    <div class="cart_t_list">
                        <div class="media">
                            <div class="media-body">
                                <h5>{{ trans('messages.shipping')}}5$~10$</h5>
                                <br>
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex">
                                <h5>{{ trans('messages.purchase')}}</h5>
                            </div>
                            <div class="media-body">
                                <h7>{{ trans('messages.purchasedetail')}}</h7>
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex">

                            </div>
                        </div>
                    </div>
                    <div class="total_amount row m0 row_disable">
                        <div class="float-left">
                            {{ trans('messages.total')}}
                        </div>
                        <div class="float-right">
                            {{ $totalPrice }}
                        </div>
                    </div>
                </div>
                <a href="{!! Route('checkout') !!}"  class="btn subs_btn form-control">{{ trans('messages.order')}}</a>
            </div>
        </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                    </div>
                    <div class="col-sm">
                        <h2>{{ trans('messages.notfound')}}</h2>
                    </div>
                    <div class="col-sm">
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@include('category.bottom_asset')
