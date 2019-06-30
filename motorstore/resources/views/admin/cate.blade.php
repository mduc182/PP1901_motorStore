@extends('admin.admin_display');
@section('content')
    <a class="btn btn-success" href="{!! Route('add_cate') !!}">{{ __('ADD New CateGory') }}</a>
    <div class="col-lg-9">
        @if(session('mess_del'))
            <p class="alert alert-success">{{ session('mess_del') }}</p>
        @endif
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
                    <td><a class="btn btn-info" href="{!! Route('edit_cate',$cate->id) !!}">{{ __('Edit') }}</a>
                        <form action="{!! Route('delete_cate') !!}" method="post">
                            <input type="hidden" value="{!! $cate->id !!}" name="id">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="{{ __('Delete') }}" class="btn btn-danger">
                        </form></td>

                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
