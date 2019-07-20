@extends('admin.admin_display');
@section('content')
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ trans('messages.id')}}</th>
                <th scope="col">{{ trans('messages.username')}}</th>
                <th scope="col">{{ trans('messages.uphone')}}</th>
                <th scope="col">{{ trans('messages.uaddress')}}</th>
                <th scope="col">{{ trans('messages.pdname')}}</th>
                <th scope="col">{{ trans('messages.action')}}</th>
            </tr>
            </thead>
            @foreach($orders as $order)
                <tbody>
                <tr>
                    <th scope="row">{!! $order['id'] !!}</th>
                    <td>{!! $order['name'] !!}</td>
                    <td>{!! $order['phone'] !!}</td>
                    <td>{!! $order['address'] !!}</td>
                    <td><a class="btn btn-danger">{{ trans('messages.delete')}}</a></td>


                </tr>
                </tbody>
            @endforeach
            {{ $orders->links() }}
        </table>
    </div>
@endsection
