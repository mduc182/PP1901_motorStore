@extends('admin.admin_display');
@section('content')
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ __('STT') }}</th>
                <th scope="col">{{ __('Tên Khách Hàng') }}</th>
                <th scope="col">{{ __('Ghi Chú') }}</th>
            </tr>
            </thead>
            @foreach($contacts as $contact)
                <tbody>
                <tr>
                    <th scope="row">{!! $contact['id'] !!}</th>
                    <td>{!! $contact['user']['name'] !!}</td>
                    <td>{!! $contact['notes'] !!}</td>
                    <td><a class="btn btn-info">{{ __('Edit') }}</a></td>
                    <td><a class="btn btn-danger">{{ __('Delete') }}</a></td>


                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
