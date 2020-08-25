@extends('dashboard')
@section('content')
<!-- Post DataTable  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Mail</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{$client->firstname}} &nbsp; {{$client->lastname}}</td>
                <td>{{$client->company}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->created_at->diffForHumans()}}</td>
                <td>{{$client->updated_at->diffForHumans()}}</td>
                <td>

                  {!! Form::open(['route'=>['clients.destroy',$client->id],'method'=>'DELETE']) !!}
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
