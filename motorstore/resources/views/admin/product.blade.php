@extends('layouts.admin')
@section('content')
    <a class="btn btn-success" href="{!! Route('add_product') !!}">{{ trans('messages.addproduct')}}</a>
    <div class="col-lg-9">
        @if(session('mess_del'))
            <p class="alert alert-success">{{ session('mess_del') }}</p>
        @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
            <tr>
                <th scope="col">{{ trans('messages.id')}}</th>
                <th scope="col">{{ trans('messages.pdname')}}</th>
                <th scope="col">{{ trans('messages.plate')}}</th>
                <th scope="col">{{ trans('messages.color')}}</th>
                <th scope="col">{{ trans('messages.year')}}</th>
                <th scope="col">{{ trans('messages.price')}}</th>
                <th scope="col">{{ trans('messages.detail')}}</th>
                <th scope="col">{{ trans('messages.type')}}</th>
                <th scope="col">{{ trans('messages.address')}}</th>
                <th scope="col">{{ trans('messages.postname')}}</th>
                <th scope="col">{{ trans('messages.action')}}</th>
                <th scope="col">{{ trans('messages.info')}}</th>

            </tr>
            </thead>
            @foreach($products as $product)
                <tbody>
                <tr>
                    <th scope="row">{!! $product['id'] !!}</th>
                    <td>{!! $product['pdname'] !!}</td>
                    <td>{!! $product['plate'] !!}</td>
                    <td>{!! $product['color']!!}</td>
                    <td>{!! $product['year'] !!}</td>
                    <td>{!! $product['price'] !!}</td>
                    <td>{!! $product['detail'] !!}</td>
                    <td>{!! $product['category']['catename'] !!}</td>
                    <td>{!! $product['branch']['address'] !!}</td>
                    <td>{!! $product['post']['post_name'] !!}</td>
                    <td><a class="btn btn-info" href="{!! Route('edit_product', $product['id']) !!}">{{ trans('messages.edit')}}</a>
                        <form action="{!! Route('delete_product') !!}" method="post">
                            <input type="hidden" value="{!! $product['id'] !!}" name="id">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                        </form></td>
                    <td><a class="btn btn-primary" href="{!! Route('product_page', $product['id']) !!}">{{ trans('messages.info')}}</a></td>


                </tr>
                </tbody>
            @endforeach
            {{ $products->links() }}

        </table>
    </div>
@endsection
