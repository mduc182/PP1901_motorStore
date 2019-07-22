@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3><p>{{ trans('messages.addproduct')}}</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!! $error !!}</p>
            @endforeach
        @endif
        <form action="{!! Route('store_post') !!}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label>{{ trans('messages.postname')}}</label>
                <input type="text" name="post_name" class="form-control">
                <br>
                <br>
                <input class="btn btn-success" value="{{ trans('messages.add')}}" type="submit" name="btn-add">

            </div>
        </form>
    </div>
@endsection
