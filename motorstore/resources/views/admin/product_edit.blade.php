@extends('admin.admin_display');
@section('content')
    <div class="container">
        <h3><p>{{ __('Edit Product') }}</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!! $error !!}</p>
            @endforeach
        @endif
        <form action="{!! Route('update_product', $products->id) !!}" method="post">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label>{{ __('Tên Xe') }}</label>
                <input type="text" name="pdname" value="{!! $products->pdname !!}" class="form-control">
                <label>{{ __('Biển Số') }}</label>
                <input type="text" name="plate" value="{!! $products->plate !!}" class="form-control">
                <label>{{ __('Màu Xe') }}</label>
                <input type="text" name="color" value="{!! $products->color !!}" class="form-control">
                <label>{{ __('Số Hiệu') }}</label>
                <input type="text" name="type" value="{!! $products->type !!}" class="form-control">
                <label>{{ __('Năm Sản Xuất') }}</label>
                <input type="text" name="year" value="{!! $products->year !!}" class="form-control">
                <label>{{ __('Giá Bán') }}</label>
                <input type="text" name="price" value="{!! $products->price !!}" class="form-control">
                <label>{{ __('Chi Tiết') }}</label>
                <input type="text" name="detail" value="{!! $products->detail !!}" class="form-control">
                <label>{{ __('Loại Xe') }}</label>
                <br>
                <select id="category_id" name="category_id">
                    @foreach($categories as $cate)
                        <option value="{!! $cate->id !!}">{!! $cate->catename !!}</option>
                    @endforeach
                </select>
                <br>
                <label>{{ __('Cửa Hàng Bán') }}</label>
                <br>
                <select id="branch_id" name="branch_id">

                    @foreach($branches as $branch)
                        <option value="{!! $branch->id !!}">{!! $branch->address !!}</option>
                    @endforeach
                </select>

                <br>
                <br>
                <br>
                <input class="btn btn-success" value="{{ __('Edit') }}" type="submit" name="btn-edit">
            </div>
        </form>

    </div>


@endsection
