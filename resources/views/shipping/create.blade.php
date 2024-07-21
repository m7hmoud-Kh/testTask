@extends('master')
@section('title')
    create Shipping
@endsection

@section('content')
@include('includes.error')
<form method="POST" action="{{ route('shipping.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="code" class="form-label">Code</label>
      <input type="text" name="code" class="form-control" id="code">
    </div>
    <div class="mb-3">
        <label for="shipper" class="form-label">Shipper</label>
        <input type="text" name="shipper" class="form-control" id="shipper">
    </div>
    <div class="mb-3">
        <label for="weight" class="form-label">weight</label>
        <input type="number" name="weight" class="form-control" id="weight">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea type="file" name="description" class="form-control" id="description"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
