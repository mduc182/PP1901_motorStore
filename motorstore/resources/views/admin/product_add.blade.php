@extends('admin.admin_display');
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
        <form action="{!! Route('store_product') !!}" method="post">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label>{{ trans('messages.pdname')}}</label>
                <input type="text" name="pdname" class="form-control">
                <label>{{ trans('messages.plate')}}</label>
                <input type="text" name="plate" class="form-control">
                <label>{{ trans('messages.color')}}</label>
                <input type="text" name="color" class="form-control">
                <label>{{ trans('messages.type')}}</label>
                <input type="text" name="type" class="form-control">
                <label>{{ trans('messages.year')}}</label>
                <input type="text" name="year" class="form-control">
                <label>{{ trans('messages.price')}}</label>
                <input type="text" name="price" class="form-control">
                <label for="image">{{ trans('messages.image')}}</label>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="file" name="image" class="py-5">


                <label>{{ trans('messages.detail')}}</label>
                <input type="text" name="detail" class="form-control">
                <label>{{ trans('messages.catename')}}</label>
                <br>
                <select id="category_id" name="category_id"><
                    @foreach($categories as $cate)
                        <option value="{!! $cate->id !!}">{!! $cate->catename !!}</option>
                    @endforeach
                </select>
                <br>
                <label>{{ trans('messages.address')}}</label>
                <br>
                <select id="address" name="address"><
                    @foreach($branches as $branch)
                        <option value="{!! $branch->id !!}">{!! $branch->address !!}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <br>
                <input class="btn btn-success" value="{{ trans('messages.add')}}" type="submit" name="btn-edit">
            </div>
        </form>
    </div>
@endsection
