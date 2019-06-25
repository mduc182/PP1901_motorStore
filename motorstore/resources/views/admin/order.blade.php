@extends('admin.admin_display');
@section('content')
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ __('STT') }}</th>
                <th scope="col">{{ __('Tên Khách Hàng') }}</th>
                <th scope="col">{{ __('SDT Khách Hàng') }}</th>
                <th scope="col">{{ __('Địa Chỉ') }}</th>
                <th scope="col">{{ __('Mã Giảm Giá') }}</th>
                <th scope="col">{{ __('Tên Sản Phẩm') }}</th>
            </tr>
            </thead>
            @foreach($orders as $order)
                <tbody>
                <tr>
                    <th scope="row">{!! $order['id'] !!}</th>
                    <td>{!! $order['user']['name'] !!}</td>
                    <td>{!! $order['user']['user_phone'] !!}</td>
                    <td>{!! $order['user']['user_address'] !!}</td>
                    <td>{!! $order['salecode'] !!}</td>
                    <td><a class="btn btn-info">{{ __('Edit') }}</a></td>
                    <td><a class="btn btn-danger">{{ __('Delete') }}</a></td>


                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
