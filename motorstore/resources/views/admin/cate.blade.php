@extends('layouts.admin')
@section('content')
    <a class="btn btn-success" href="{!! Route('add_cate') !!}">{{ trans('messages.addcate') }}</a>
    <div class="col-lg-9">
        @if(session('mess_del'))
            <p class="alert alert-success">{{ session('mess_del') }}</p>
        @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
            <tr>
                <th scope="col">{{ trans('messages.id') }}</th>
                <th scope="col">{{ trans('messages.catename') }}</th>
                <th scope="col">{{ trans('messages.type') }}</th>
                <th scope="col">{{ trans('messages.action') }}</th>
            </tr>
            </thead>
            @foreach($categories as $cate)
                <tbody>
                <tr>
                    <th scope="row">{!! $cate->id !!}</th>
                    <td>{!! $cate->catename !!}</td>
                    <td>{!! $cate->parent_id !!}</td>
                    <td><a class="btn btn-info" href="{!! Route('edit_cate',$cate->id) !!}">{{ trans('messages.edit') }}</a>
                        <form action="{!! Route('delete_cate') !!}" method="post">
                            <input type="hidden" value="{!! $cate->id !!}" name="id">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                        </form></td>

                </tr>
                </tbody>
            @endforeach
            {{ $categories->links() }}

        </table>
    </div>
@endsection
