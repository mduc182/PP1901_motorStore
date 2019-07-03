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
                <th scope="col">{{ trans('messages.salecode')}}</th>
                <th scope="col">{{ trans('messages.pdname')}}</th>
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
                    <td><a class="btn btn-info">{{ trans('messages.edit')}}</a></td>
                    <td><a class="btn btn-danger">{{ trans('messages.delete')}}</a></td>


                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
