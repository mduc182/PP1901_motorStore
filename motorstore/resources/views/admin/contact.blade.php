@extends('layouts.admin')
@section('content')
    <div class="col-lg-9">
        @if(session('mess_del'))
            <p class="alert alert-success">{{ session('mess_del') }}</p>
        @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

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
                   <td> <form action="{!! Route('delete_contact') !!}" method="post">
                        <input type="hidden" value="{!! $contact['id'] !!}" name="id">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                    </form></td>


                </tr>
                </tbody>
            @endforeach
            {{ $contacts->links() }}
        </table>
    </div>
@endsection
