@extends('userdashboard')
@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Hello world
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>











<!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Leads Overview</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" width="100%" cellspacing="0">
                <table id="table_id" class="table table-bordered display">
                    <thead>
                        <tr>
                            <th>Lead created </th>
                            <th>Lead</th>
                            <th>Type</th>
                            <th>Main shoot date</th>
                            <th>Mail status</th>
                            <th>Next task</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($leads as $lead)
                        <tr>
                            <td>{{$lead->created_at->diffForHumans()}}</td>
                            <td>{{$lead->name}}</td>
                            <td>{{$lead->job->name}}</td>
                            <td>{{$lead->start_time ? $lead->start_time->diffForHumans() : ''}}</td>
                            <td>Pending</td>
                            <td></td>
                            <td>
                                <!-- Default dropright button -->
                                <div class="dropright">
                                <div class="test" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->

                                    <ul class="navbar-nav mx-auto w-50">
                                        <li class="nav-item active mb-2" style="cursor: pointer;">
                                            <div  href="#exampleModalLong" data-toggle="modal">Send Email<span class="sr-only">(current)</span></div>
                                        </li>
                                        <li class="nav-item" style="cursor: pointer;">
                                            <div  data-target="#exampleModalLong" data-toggle="modal">Send Email<span class="sr-only">(current)</span></div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          
@endsection
@section('scripts')
    <script>
         $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@stop