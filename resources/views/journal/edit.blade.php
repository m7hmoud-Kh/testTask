@extends('master')
@section('title')
    Update Shipping
@endsection

@section('content')
@include('includes.error')
<form method="POST" action="{{ route('shipping.update',$shipping->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="code" class="form-label">Code</label>
      <input type="text" name="code" class="form-control" id="code"
      value="{{old('code',$shipping->code)}}">
    </div>
    <div class="mb-3">
        <label for="shipper" class="form-label">Shipper</label>
        <input type="text" name="shipper" class="form-control" id="shipper"
        value="{{old('shipper',$shipping->shipper)}}">
    </div>
    <div class="mb-3">
        <label for="weight" class="form-label">weight</label>
        <input type="number" name="weight" class="form-control" id="weight"
        value="{{old('weight',$shipping->weight)}}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea type="file" name="description" class="form-control" id="description">{{old('description', $shipping->description)}}
        </textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status">
            <option value="0" @if ($shipping->status == 0)
                selected
            @endif >Pending</option>
            <option value="1"  @if ($shipping->status == 1)
                selected
            @endif>Progress</option>
            <option value="2"  @if ($shipping->status == 2)
                selected
            @endif>Done</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection
