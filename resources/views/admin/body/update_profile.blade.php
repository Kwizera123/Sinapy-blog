
@extends('admin.admin_master')

@section('admin')


<div class="card card-default">
  <div class="card-header card-header-border-bottom">
    <h2>User Profile Update</h2>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="card-body">
    <form method="post" action="{{ route('update.user.profile') }}" class="form-pill" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput3">User Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user['name'] }}">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput3">User Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user['email'] }}">
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1">Profile Picture</label>
      <input type="file" name="profile_photo_path" class="form-control" aria-describedby="emailHelp" multiple="">
   
          @error('profile_photo_path')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

          <div class="form-group">
            <img src="{{ Auth::user()->profile_photo_url }}" style="width:100px; height:100px;">
          </div>

      <button type="submit" class="btn btn-primary btn-default">Update</button>

    </form>
  </div>
</div>


@endsection