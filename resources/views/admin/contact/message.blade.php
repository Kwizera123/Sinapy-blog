@extends('admin.admin_master')

@section('admin')

  <div class="py-12">
          <div class="container">
              <div class="row">
<h4>Admin Message</h4>
                
                <br><br>

                <div class="col-md-12">
                  <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-header">All Message Data</div>
                 

                 <table class="table">
                 <thead>
                <tr>
                  <th scope="col" width="2%">SL No</th>
                  <th scope="col" width="8%">Name</th>
                  <th scope="col" width="10%">Email</th>
                  <th scope="col" width="13%">Subject </th>
                  <th scope="col" width="15%">Message </th>
                  <th scope="col" width="3%">Recieved At</th>
                  <th scope="col"width="5%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @php($i = 1) 
                  @foreach($messages as $messag)
                <tr>
                  <th scope="row">{{ $i++ }}</th>
                  <td>{{ $messag->name }}</td>
                  <td>{{ $messag->email }}</td>
                  <td>{{ $messag->subject }}</td>
                  <td>{{ $messag->message }}</td>
                  <td>
                    @if($messag->created_at == NULL)
                    <span class="text-danger">No Date Set</span>
                    @else
                    {{ Carbon\Carbon::parse($messag->created_at)->diffForHumans() }}
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('message/delete/'.$messag->id) }}" onclick="return confirm('Are you sure you want to Delete this Contact Address with its details ?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
{{-- Trach Code --}}



{{-- End of Trach code  --}}
  </div>
@endsection
