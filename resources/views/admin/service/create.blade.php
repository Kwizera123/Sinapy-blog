@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
  <div class="card card-default">
    <div class="card-header card-header-border-bottom">
      <h2>Create Service</h2>
    </div>
    <div class="card-body">
      <form action="{{ route('store.service') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Service Title</label>
          <input type="text" name="title" class="form-control"  placeholder="Enter Service Title">
         
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Service Description </label>
          <textarea class="form-control" name="short_dis" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Service Image</label>
          <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Item Title</label>
          <input type="text" name="item" class="form-control"  placeholder="Enter Item Title">
         
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Item Description </label>
          <textarea class="form-control" name="item_dis" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-footer pt-4 pt-5 mt-4 border-top">
          <button type="submit" class="btn btn-primary btn-default">Submit</button>
        </div>
      </form>
    </div>
  </div>

</div>

@endsection