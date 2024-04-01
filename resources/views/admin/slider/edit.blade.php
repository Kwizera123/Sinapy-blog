@extends('admin.admin_master')

@section('admin')

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong> </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="py-12">
      

          <div class="container">
              <div class="row">



        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Edit Slider</div>
              <div class="card-body">
                <form action="{{ url('slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Update Slider Title</label>
                  <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                  value="{{ $sliders->title}}" aria-describedby="emailHelp">

                      @error('title')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror

                  </div><br>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Update Slider Description</label>
                    <textarea name="description" class="form-control" id="exampleInputEmail1"
                     aria-describedby="emailHelp">
                     {{ $sliders->description}}"
                    </textarea>
  
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
  
                    </div><br>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Update Slider photo</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                    value="{{ $sliders->image }}" aria-describedby="emailHelp">
  
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
  
                    </div><br>

                    <div class="form-group">
                      <img src="{{ asset($sliders->image) }}" style="width:300px; height:200px;">
                    </div>
                    <br>
                  <button type="submit" class="btn btn-success">Update Slider</button>
                </form>
              </div>
          </div>
        </div>
        


      </div>
    </div>
     
  </div>
@endsection
