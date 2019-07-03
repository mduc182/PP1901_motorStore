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
                <th scope="col">{{ trans('messages.address')}}</th>
                <th scope="col">{{ trans('messages.phone')}}</th>
                <th scope="col">{{ trans('messages.email')}}</th>
                <th scope="col">{{ trans('messages.role')}}</th>
                <th scope="col">{{ trans('messages.action')}}</th>
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
                <td><a class="btn btn-info" href="{!! Route('edit_user',$user->id) !!}">{{ trans('messages.edit') }}</a>
                <form action="{!! Route('delete_user') !!}" method="post">
                <input type="hidden" value="{!! $user->id !!}" name="id">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                </form>
                </td>


            </tr>
            </tbody>
            @endforeach

        </table>
    </div>
@endsection
