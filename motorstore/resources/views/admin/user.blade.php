@extends('admin.admin_display');
@section('content')
    <div class="col-lg-9">
        @if(session('mess_del'))
            <p class="alert alert-success">{{ session('mess_del') }}</p>
         @endif
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ __('STT') }}</th>
                <th scope="col">{{ __('Tên Người Dùng') }}</th>
                <th scope="col">{{ __('Địa Chỉ') }}</th>
                <th scope="col">{{ __('SĐT') }}</th>
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
                <td>{!! $user->user_address !!}</td>
                <td>{!! $user->user_phone !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->isAdmin !!}</td>
                <td><a class="btn btn-info" href="{!! Route('edit_user',$user->id) !!}">{{ __('Edit') }}</a>
                <form action="{!! Route('delete_user') !!}" method="post">
                <input type="hidden" value="{!! $user->id !!}" name="id">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="{{ __('Delete') }}" class="btn btn-danger">
                </form>
                </td>


            </tr>
            </tbody>
            @endforeach

        </table>
    </div>
@endsection
