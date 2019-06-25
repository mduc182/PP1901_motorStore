@extends('admin.admin_display');
@section('content')
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ __('STT') }}</th>
                <th scope="col">{{ __('Tên Khách Hàng') }}</th>
                <th scope="col">{{ __('SĐT Khách Hàng') }}</th>
                <th scope="col">{{ __('Địa Chỉ') }}</th>
                <th scope="col">{{ __('Ghi Chú') }}</th>
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


                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
