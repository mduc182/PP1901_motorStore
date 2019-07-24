@include('category.header')
    <div class="row">
        <div class="col-md-2">
        </div>
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
        <div class="col-md-4">
            <br>
            <br>
            <br>
            <a href="{!! Route('product_page', $products->id) !!}"><img src="/images/{!! $products->image !!}" alt="" width="300px" height="300px"></a>
            <br>
            <br>
            <br>
            <ul class="c_product_btn">
                <li><a class="add_cart_btn" href="{!! Route('add_cart', $products->id) !!}">{{ trans('messages.order')}}</a></li>
            </ul>
        </div>
    </div>
<br>
<br>
<br>

@include('category.footer')
@include('category.bottom_asset')

