@extends('admin.admin_display')
@section('content')
    <div class="container">
        <h3><p>{{ trans('messages.addbranch')}}</p></h3>
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!! $error !!}</p>
            @endforeach
        @endif
        <form action="{!! Route('store_branch') !!}" method="post">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label>{{ trans('messages.address')}}</label>
                <input type="text" name="address" class="form-control">
                <label>{{ trans('messages.phone')}}</label>
                <input type="text" name="phone"  class="form-control">
                <br>
                <br>
                <br>
                <input class="btn btn-success" value="{{ trans('messages.add')}}" type="submit" name="btn-edit">
            </div>
        </form>
    </div>
@endsection
