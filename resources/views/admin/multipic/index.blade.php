@extends('admin.admin_master')

@section('admin')

  <div class="py-12">
      

          <div class="container">
              <div class="row">
                

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('success') }}</strong> </strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="col-md-8">
                    <div class="card-group">
                      

                      @foreach($images as $multi)

                      <div class="col-md-4 mt-3">
                        <div class="card">
                          <img src="{{ asset($multi->image) }}" class="rounded float-start" alt="Images">
                        </div>
                      </div>

                      @endforeach

                    </div>



        </div>

        <div class="col-md-4">
          <h4>PORTFOLIO</h4>
          <div class="card">
            <div class="card-header">Multi Image</div>
              <div class="card-body">
                <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Multi Image</label>
                    <input type="file" name="image[ ]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
  
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
  
                    </div><br>




                  <button type="submit" class="btn btn-primary">Add Image</button>
                </form>
              </div>
          </div>
        </div>
        


      </div>
    </div>
{{-- Trach Code --}}



{{-- End of Trach code  --}}
  </div>
  @endsection
