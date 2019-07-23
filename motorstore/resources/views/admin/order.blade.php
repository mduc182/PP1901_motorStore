@extends('admin.admin_display');
@section('content')
    <div class="col-lg-9">
        @if(session('mess_del'))
            <p class="alert alert-success">{{ session('mess_del') }}</p>
        @endif
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ trans('messages.id')}}</th>
                <th scope="col">{{ trans('messages.username')}}</th>
                <th scope="col">{{ trans('messages.uphone')}}</th>
                <th scope="col">{{ trans('messages.uaddress')}}</th>
                <th scope="col">{{ trans('messages.pdname')}}</th>
                <th scope="col">{{ trans('messages.total')}}</th>
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
                    <td>{!! $order['product_name'] !!}</td>
                    <td>{!! $order['total'] !!}</td>
                    <td><form action="{!! Route('delete_order') !!}" method="post">
                            <input type="hidden" value="{!! $order['id'] !!}" name="id">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                        </form></td>

                </tr>
                </tbody>
            @endforeach
            {{ $orders->links() }}
        </table>
    </div>
@endsection
