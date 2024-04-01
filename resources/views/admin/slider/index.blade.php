@extends('admin.admin_master')

@section('admin')

  <div class="py-12">
          <div class="container">
              <div class="row">
<h4>Home Slider</h4>
                <a href="{{ route('add.slider') }}"><button class="btn btn-info">Add Slider</button> </a>
                <br><br><br>

                <div class="col-md-12">
                  <div class="card">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong> </strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    
                    <div class="card-header">Home Sliders</div>
                 

                 <table class="table">
                 <thead>
                <tr>
                  <th scope="col" width="2%">SL No</th>
                  <th scope="col" width="10%">Slider Title</th>
                  <th scope="col" width="15%">Description</th>
                  <th scope="col" width="4%">Image</th>
                  <th scope="col" width="5%">Created At</th>
                  <th scope="col"width="5%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @php($i = 1) 
                  @foreach($sliders as $slider)
                <tr>
                  <th scope="row">{{ $i++ }}</th>
                  <td>{{ $slider->title }}</td>
                  <td>{{ $slider->description }}</td>
                  <td> <img src="{{ asset($slider->image) }}" style="height:40px; width:80px;"> </td>
                  <td>
                    @if($slider->created_at == NULL)
                    <span class="text-danger">No Date Set</span>
                    @else
                    {{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure you want to Delete this Slider with its details ?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
             {{-- {{ $sliders->links() }} --}}
          </div>
        </div>

        {{-- <div class="col-md-4">
          <div class="card">
            <div class="card-header">Add Brand</div>
              <div class="card-body">
                <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                  <label for="exampleInputEmail1">Brand Name</label>
                  <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                      @error('brand_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror

                  </div><br>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Image</label>
                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  
                        @error('brand_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
  
                    </div><br>




                  <button type="submit" class="btn btn-primary">Add Brand</button>
                </form>
              </div>
          </div>
        </div> --}}
        


      </div>
    </div>
{{-- Trach Code --}}



{{-- End of Trach code  --}}
  </div>
@endsection
