@extends('admin.admin_display');
@section('content')
    <div class="col-lg-9">
        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">{{ trans('messages.id')}}</th>
                <th scope="col">{{ trans('messages.notes')}}</th>
                <th scope="col">{{ trans('messages.uphone')}}</th>
                <th scope="col">{{ trans('messages.uaddress')}}</th>
            </tr>
            </thead>
            @foreach($contacts as $contact)
                <tbody>
                <tr>
                    <th scope="row">{!! $contact['id'] !!}</th>
                    <td>{!! $contact['notes'] !!}</td>
                    <td>{!! $contact['phone'] !!}</td>
                    <td>{!! $contact['address'] !!}</td>

                    <td><a class="btn btn-info">{{ trans('messages.edit')}}</a></td>
                    <td><a class="btn btn-danger">{{ trans('messages.delete')}}</a></td>


                </tr>
                </tbody>
            @endforeach
            {{ $contacts->links() }}
        </table>
    </div>
@endsection
