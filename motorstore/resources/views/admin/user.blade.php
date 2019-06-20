@extends('admin.admin_display');
@section('content')
    <a class="btn btn-success">{{ __('ADD New User') }}</a>
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ __('STT') }}</th>
                <th scope="col">{{ __('Tên Người Dùng') }}</th>
                <th scope="col">{{ __('Email') }}</th>
                <th scope="col">{{ __('Role') }}</th>
                <th scope="col">{{ __('Action') }}</th>
            </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
            <tr>
                <th scope="row">{!! $user->id !!}</th>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->isAdmin !!}</td>
                <td><a class="btn btn-info">{{ __('Edit') }}</a></td>
                <td><a class="btn btn-danger">{{ __('Delete') }}</a></td>


            </tr>
            </tbody>
            @endforeach

        </table>
    </div>
@endsection
