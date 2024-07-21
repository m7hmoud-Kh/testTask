@extends('master')
@section('title')
Shipping
@endsection
@section('content')
<a href="{{route('shipping.create')}}" class="btn btn-success">Add</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">code</th>
            <th scope="col">shipper</th>
            <th scope="col">image</th>
            <th scope="col">weight</th>
            <th scope="col">description</th>
            <th scope="col">price</th>
            <th scope="col">status</th>
            <th scope="col">Operations</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($allShipping as $shipping)
        <tr>
            <th scope="row">{{$shipping->id}}</th>
            <td>{{$shipping->code}}</td>
            <td>{{$shipping->shipper}}</td>
            <td>
                <img width="100" height="100" src="{{$shipping->image}}" alt="{{$shipping->code}}">
            </td>
            <td>{{$shipping->weight}}</td>
            <td>{{$shipping->description}}</td>
            <td>{{$shipping->price}}</td>
            <td>{{$shipping->status}}</td>
            <td>edit/delete</td>
        </tr>
        @empty
        <tr>
            <td>No Data Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
