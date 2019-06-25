@extends('admin.admin_display');
@section('content')
    <div class="container">
        <h3><p>{{ __('Edit User') }}</p></h3>
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
                <label>User Name</label>
                <input type="text" name="name" value="{!! $users->name !!}" class="form-control">
                <label>Email</label>
                <input type="text" name="email" value="{!! $users->email !!}" class="form-control">
                <label>Address</label>
                <input type="text" name="user_address" value="{!! $users->user_address !!}" class="form-control">
                <label>Phone</label>
                <input type="text" name="user_phone" value="{!! $users->user_phone !!}" class="form-control">
                <label>Role</label>
                <input type="text" name="isAdmin" value="{!! $users->user_isAdmin !!}" class="form-control">
                <br>
                <br>
                <br>
                <input class="btn btn-success" value="{{ __('Edit') }}" type="submit" name="btn-edit">
            </div>
        </form>

    </div>


@endsection
