@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3><p>{{ trans('messages.edituser') }}</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!! $error !!}</p>
            @endforeach
        @endif
        <form action="{!! Route('update_user', $users->id) !!}" method="post">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label>{{ trans('messages.username') }}</label>
                <input type="text" name="name" value="{!! $users->name !!}" class="form-control">
                <label>{{ trans('messages.email') }}</label>
                <input type="text" name="email" value="{!! $users->email !!}" class="form-control">
                <label>{{ trans('messages.address') }}</label>
                <input type="text" name="user_address" value="{!! $users->user_address !!}" class="form-control">
                <label>{{ trans('messages.phone') }}</label>
                <input type="text" name="user_phone" value="{!! $users->user_phone !!}" class="form-control">
                <label>{{ trans('messages.role') }}</label>
                <input type="text" name="isAdmin" value="{!! $users->user_isAdmin !!}" class="form-control">
                <br>
                <br>
                <br>
                <input class="btn btn-success" value="{{ trans('messages.edit') }}" type="submit" name="btn-edit">
            </div>
        </form>

    </div>


@endsection
