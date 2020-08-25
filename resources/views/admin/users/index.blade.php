@extends('dashboard')
@section('content')
<!-- Post DataTable  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Leads</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}} &nbsp; {{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>

                  {!! Form::open(['route'=>['users.destroy',$user->id],'method'=>'DELETE']) !!}
                  <button type="submit" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                  </button>
                  {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
  </div>
</div>



@endsection
