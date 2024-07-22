@extends('master')
@section('title')
Shipping
@endsection
@section('content')
@include('includes.success')
<table class="table table-striped table-hover mt-2">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Amount</th>
            <th scope="col">Type</th>
            <th scope="col">Operations</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($allJournal as $journal)
        <tr>
            <th scope="row">{{$journal->id}}</th>
            <td>{{$journal->amount}}</td>
            <td>{{$journal->type}}</td>
            <td>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $journal->id }}').submit();">
                    Delete
                </a>
                <form id="delete-form-{{ $journal->id }}" action="{{ route('journals.destory', $journal->id) }}" method="POST" style="display:none;">
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
