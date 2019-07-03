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
                <th scope="col">{{ trans('messages.uaddress')}}</th>
            </tr>
            </thead>
            @foreach($contacts as $contact)
                <tbody>
                <tr>
                    <th scope="row">{!! $contact['id'] !!}</th>
                    <td>{!! $contact['user']['name'] !!}</td>
                    <td>{!! $contact['user']['user_phone'] !!}</td>
                    <td>{!! $contact['user']['user_address'] !!}</td>
                    <td>{!! $contact['notes'] !!}</td>
                    <td><a class="btn btn-info">{{ trans('messages.edit')}}</a></td>
                    <td><a class="btn btn-danger">{{ trans('messages.delete')}}</a></td>


                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
