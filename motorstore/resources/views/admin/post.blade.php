@extends('admin.admin_display');
@section('content')
    <a class="btn btn-success" href="{!! Route('add_post') !!}">{{ trans('messages.addpost') }}</a>
    <div class="col-lg-9">
        @if(session('mess_del'))
            <p class="alert alert-success">{{ session('mess_del') }}</p>
        @endif
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ trans('messages.id') }}</th>
                <th scope="col">{{ trans('messages.postname') }}</th>
            </tr>
            </thead>
            @foreach($posts as $post)
                <tbody>
                <tr>
                    <th scope="row">{!! $post->id !!}</th>
                    <td>{!! $post->post_name !!}</td>
                    <td><a class="btn btn-info" href="{!! Route('edit_post', $post->id) !!}">{{ trans('messages.edit') }}</a>
                        <form action="{!! Route('delete_post') !!}" method="post">
                            <input type="hidden" value="{!! $post->id !!}" name="id">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                        </form></td>

                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
