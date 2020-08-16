@extends('userdashboard')
@section('content')

<!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Row 1 Data 1</td>
                            <td>Lorem ipsum dolor sit amet consecteturs</td>
                            <td>Row 1 Data 2</td>
                            <td>Row 1 Data 2</td>
                            <td>Row 1 Data 2</td>
                            <td>Row 1 Data 2</td>
                        </tr>
                        <tr>
                            <td>Row 1 Data 1</td>
                            <td>Row 1 Data 2</td>
                            <td>Row 1 Data 2</td>
                            <td>Row 1 Data 2</td>
                            <td>Row 1 Data 2</td>
                            <td>Row 1 Data 2</td>
                        </tr>
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