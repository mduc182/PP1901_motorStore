@extends('admin.admin_display');
@section('content')
    <a class="btn btn-success">{{ __('ADD New Branch') }}</a>
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ __('STT') }}</th>
                <th scope="col">{{ __('Địa Chỉ') }}</th>
                <th scope="col">{{ __('Số Điện Thoại') }}</th>

            </tr>
            </thead>
            @foreach($branches as $branch)
                <tbody>
                <tr>
                    <th scope="row">{!! $branch['id'] !!}</th>
                    <td>{!! $branch['address'] !!}</td>
                    <td>{!! $branch['phone'] !!}</td>
                    <td><a class="btn btn-info">{{ __('Edit') }}</a></td>
                    <td><a class="btn btn-danger">{{ __('Delete') }}</a></td>


                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
