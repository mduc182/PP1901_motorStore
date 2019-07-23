@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3><p>{{ trans('messages.editpost') }}</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!! $error !!}</p>
            @endforeach
        @endif
        <form action="{!! Route('update_post', $posts->id) !!}" method="post">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label>{{ trans('messages.postname') }}</label>
                <input type="text" name="post_name" value="{!! $posts->post_name !!}" class="form-control">
                <br>
                <br>
                <br>
                <input class="btn btn-success" value="{{ trans('messages.edit') }}" type="submit" name="btn-edit">
            </div>
        </form>

    </div>
@endsection
