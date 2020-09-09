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
                    <th>Location</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
    </thead>
    <tbody>
        @foreach ($leads as $lead)
            <tr>
                <td>{{$lead->name}} &nbsp; {{$lead->lastname}}</td>
                <td>{{$lead->location}}</td>
                <td>{{$lead->created_at->diffForHumans()}}</td>
                <td>{{$lead->updated_at->diffForHumans()}}</td>
                <td>

                  {!! Form::open(['route'=>['leads.destroy',$lead->id],'method'=>'DELETE']) !!}
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
