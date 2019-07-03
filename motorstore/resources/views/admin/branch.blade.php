@extends('admin.admin_display');
@section('content')
    @if(isset($mess))
        <p class="alert alert-success">{!! $mess !!}</p>
    @endif
    @if(session('mess_del'))
        <p class="alert alert-success">{{ session('mess_del') }}</p>
    @endif
    <a class="btn btn-success" href="{!! Route('add_branch') !!}">{{ trans('messages.addbranch')}}</a>
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ trans('messages.id')}}</th>
                <th scope="col">{{ trans('messages.address')}}</th>
                <th scope="col">{{ trans('messages.phone')}}</th>

            </tr>
            </thead>
            @foreach($branches as $branch)
                <tbody>
                <tr>
                    <th scope="row">{!! $branch['id'] !!}</th>
                    <td>{!! $branch['address'] !!}</td>
                    <td>{!! $branch['phone'] !!}</td>
                    <td><a class="btn btn-primary" href="{!! Route('branch_info', $branch->id) !!}">{{ trans('messages.info')}}</a>
                    <td><a class="btn btn-info" href="{!! Route('edit_branch', $branch->id) !!}">{{ trans('messages.edit')}}</a>
                        <form action="{!! Route('delete_branch') !!}" method="post">
                            <input type="hidden" value="{!! $branch->id !!}" name="id">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="{{ trans('messages.delete')}}" class="btn btn-danger">
                        </form></td>


                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
