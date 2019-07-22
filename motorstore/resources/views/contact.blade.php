@extends('category.cate_display');
@section('content')

    @if(isset($mess))
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <p class="alert alert-success">{!! $mess !!}</p>
        </div>
    @endif
    @if(isset($errors))
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{!! $error !!}</p>
        @endforeach
    @endif
    <form action="{!! Route('store_contact') !!}" method="post">
        {{ csrf_field() }}
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>{{ trans('messages.contactpage')}}</h1>
            <br>
            <label>{{ trans('messages.notes')}}</label>
            <input type="text" name="notes" class="form-control">

            <br>
            <label>{{ trans('messages.yphone')}}</label>
            <input type="text" name="phone" class="form-control">
            <label>{{ trans('messages.yaddress')}}</label>
            <input type="text" name="address" class="form-control">
            <br>

            <input class="btn btn-success" value="{{ trans('messages.add')}}" type="submit" name="btn-edit">
        </div>
    </form>
@endsection

