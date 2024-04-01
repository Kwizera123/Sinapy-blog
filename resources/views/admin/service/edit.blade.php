@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
  <div class="card card-default">
    <div class="card-header card-header-border-bottom">
      <h2>Edit Service</h2>
    </div>
    <div class="card-body">
      <form action="{{ url('service/update/'.$homeservices->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="old_image" value="{{ $homeservices->image }}">
        <div class="form-group">
          <label for="exampleFormControlInput1">Service Title</label>
          <input type="text" name="title" class="form-control" value="{{ $homeservices->title }}"  placeholder="Enter Service Title">
         
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Service Description </label>
          <textarea class="form-control" name="short_dis" id="exampleFormControlTextarea1" rows="3">
            {{ $homeservices->short_dis }}
          </textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Service Image</label>
          <input type="file" name="image" class="form-control-file" value="{{ $homeservices->image }}" id="exampleFormControlFile1">

          @error('image')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <img src="{{ asset($homeservices->image) }}" style="width:100px; height:100px;">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Item Title</label>
          <input type="text" name="item" class="form-control" value="{{ $homeservices->item }} "  placeholder="Enter Item Title">
         
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Item Description </label>
          <textarea class="form-control" name="item_dis" id="exampleFormControlTextarea1" rows="3">
            {{ $homeservices->item_dis }}
          </textarea>
        </div>
        <div class="form-footer pt-4 pt-5 mt-4 border-top">
          <button type="submit" class="btn btn-primary btn-default">Update</button>
        </div>
      </form>
    </div>
  </div>

</div>

@endsection