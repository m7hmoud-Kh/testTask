@extends('master')
@section('title')
    create journal
@endsection

@section('content')
@include('includes.error')
<form method="POST" action="{{ route('journals.store') }}">
    @csrf
    <input type="hidden" name="shipping_id" value="{{$shippingId}}" />
    <div class="mb-3">
        <label for="type" class="form-label">Choose Type</label>
        <select name="type" id="type" class="form-control">
            <option value="Debit Cash">Debit Cash</option>
            <option value="Credit Revenue">Credit Revenue</option>
            <option value="Credit Payable">Credit Payable</option>
        </select>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
