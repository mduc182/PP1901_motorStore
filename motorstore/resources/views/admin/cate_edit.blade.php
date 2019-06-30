@extends('admin.admin_display');
@section('content')
    <div class="container">
        <h3><p>{{ __('Edit Category') }}</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!! $error !!}</p>
            @endforeach
        @endif
        <form action="{!! Route('update_cate', $categories->id) !!}" method="post">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label>{{ __('Tên Dòng Xe') }}</label>
                <input type="text" name="catename" value="{!! $categories->catename !!}" class="form-control">
                <label>{{ __('Loại') }}</label>
                <input type="text" name="parent_id" value="{!! $categories->parent_id !!}" class="form-control">
                <br>
                <br>
                <br>
                <input class="btn btn-success" value="{{ __('Edit') }}" type="submit" name="btn-edit">
            </div>
        </form>

    </div>


@endsection
