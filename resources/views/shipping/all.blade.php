@extends('master')
@section('title')
Shipping
@endsection
@section('content')
<a href="{{route('shipping.create')}}" class="btn btn-success mb-2">Add</a>

@include('includes.success')
<table class="table table-striped table-hover mt-2">
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
            <td>{!!$shipping->getStatusName($shipping->status)!!}</td>
            <td>
                @if ($shipping->status == 2)
                <a href="{{route('journals.create',$shipping->id)}}" class="btn btn-success">Add Journal</a>
                <a href="{{route('journals.index',$shipping->id)}}" class="btn btn-success">show Journal</a>
                @else
                <a href="{{route('shipping.edit',$shipping->id)}}" class="btn btn-primary">Edit</a>
                @endif
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $shipping->id }}').submit();">
                    Delete
                </a>
                <form id="delete-form-{{ $shipping->id }}" action="{{ route('shipping.destroy', $shipping->id) }}" method="POST" style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>No Data Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
