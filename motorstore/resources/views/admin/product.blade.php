@extends('admin.admin_display');
@section('content')
    <a class="btn btn-success">{{ __('ADD New ProDuct') }}</a>
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ __('STT') }}</th>
                <th scope="col">{{ __('Tên Xe') }}</th>
                <th scope="col">{{ __('Biển Số Xe') }}</th>
                <th scope="col">{{ __('Màu Xe') }}</th>
                <th scope="col">{{ __('Năm Sản Xuất') }}</th>
                <th scope="col">{{ __('Giá Bán') }}</th>
                <th scope="col">{{ __('Chi Tiết') }}</th>
                <th scope="col">{{ __('Loại Xe') }}</th>

            </tr>
            </thead>
            @foreach($products as $product)
                <tbody>
                <tr>
                    <th scope="row">{!! $product['id'] !!}</th>
                    <td>{!! $product['pdname'] !!}</td>
                    <td>{!! $product['plate'] !!}</td>
                    <td>{!! $product['color']!!}</td>
                    <td>{!! $product['year'] !!}</td>
                    <td>{!! $product['price'] !!}</td>
                    <td>{!! $product['detail'] !!}</td>
                    <td>{!! $product['category']['catename'] !!}</td>
                    <td><a class="btn btn-info">{{ __('Edit') }}</a></td>
                    <td><a class="btn btn-danger">{{ __('Delete') }}</a></td>


                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
