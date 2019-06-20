@extends('admin.admin_display');
@section('content')
    <a class="btn btn-success">{{ __('ADD New CateGory') }}</a>
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ __('STT') }}</th>
                <th scope="col">{{ __('Tên Dòng Xe') }}</th>
                <th scope="col">{{ __('Loại Xe') }}</th>
                <th scope="col">{{ __('Action') }}</th>
            </tr>
            </thead>
            @foreach($categories as $cate)
                <tbody>
                <tr>
                    <th scope="row">{!! $cate->id !!}</th>
                    <td>{!! $cate->catename !!}</td>
                    <td>{!! $cate->parent_id !!}</td>
                    <td><a class="btn btn-info">{{ __('Edit') }}</a></td>
                    <td><a class="btn btn-danger">{{ __('Delete') }}</a></td>


                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
