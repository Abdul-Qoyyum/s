@extends('userdashboard')
@section('content')


<!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Clients Overview</h6>
              <div class="row">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-6 d-flex flex-row-reverse bd-highlight">
                    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addClient">Add new client</button>
                    <button type="button" class="btn btn-info mb-1 mr-1">Export clients</button>
                    <button type="button" class="btn btn-info mb-1 mr-1">Import clients</button>
                  </div>
              </div>
            </div>
            <div class="card-body">

              <div class="table-responsive" width="100%" cellspacing="0">
                <table id="table_id" class="table table-bordered display">
                    <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($clients as $client)
                        <tr>
                            <td>{{$client->firstname}}</td>
                            <td>{{$client->lastname}}</td>
                            <td>{{$client->company}}</td>
                            <td>{{$client->phone}}</td>
                            <td>{{$client->email}}</td>
                            <td>
                                <!-- Default dropright button -->
                                <div class="dropright">
                                <div class="test" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->

                                    <ul class="navbar-nav mx-4 w-60">
                                        <li class="nav-item active mb-2" style="cursor: pointer;">
                                            <div  href="#exampleModalLong" data-toggle="modal"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Email</div>
                                        </li>
                                        <li class="nav-item" style="cursor: pointer;">
                                            <a href="{{route('client.edit',$client->id)}}"><i class="fas fa-edit"></i> Edit Client</a>
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


<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-align" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add A New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <form  action="/client" method="POST" class="client">
           <div class="modal-body">

          @csrf
          <div class="form-check">
            <input type="checkbox" class="form-check-input display">
            <label class="form-check-label" for="display">This client is a company and invoices will be addressed to the company.</label>
          </div>
          <div class="company hidden">
            <div class="form-group">
              <label for="company">Company</label>
              <input type="text" name="company" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="businessno">Business Number</label>
              <input type="text" name="businessno" class="form-control" value="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="firstname">First Name*</label>
              <input type="text" name="firstname" class="form-control"  value="">
            </div>
            <div class="col-md-6">
              <label for="lastname">Last Name</label>
              <input type="text" name="lastname" class="form-control"  value="">
            </div>
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="email">Email*</label>
            <input type="email" name="email" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="address">Street Address</label>
            <input type="text" name="address" class="form-control" value="">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="town">Suburb/Town</label>
              <input type="text" name="town" class="form-control"  value="">
            </div>
            <div class="col-md-6">
              <label for="postcode">Postcode/Zip</label>
              <input type="text" name="postcode" class="form-control"  value="">
            </div>
          </div>
          <div class="form-group">
            <label for="state">State</label>
            <input type="text" name="state" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="notes">Client Notes</label>
            <textarea name="notes" rows="8" cols="80" class="form-control notes"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" value="Save Client Profile">
        </div>
     </div>
    <form>
  </div>


<!-- Import clients modal -->
<!-- Modal -->
<div class="modal fade modal_1" id="importClients" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import clients</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>You can bulk import a large number of clients using CSV file. Please download and use our CSV file template below.</p>
        <a href="{{route('client.sample')}}" class="btn btn-success mb-3">Download CSV template</a>
        <p>Please make sure you do not reorder, delete or change the column titles within the original CSV file before uploading it.</p>
        {{-- <form action="{{route('client.import')}}" method="post" enctype="multipart/form-data" class="dropzone">
          @csrf
          <div class="fallback">
            <input name="file" type="file"/>
          </div>
          <div>
          </div>
        </form> --}}

        <form action="{{route('client.import')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="spreadsheet">Choose File</label>
            <input type="file" name="file" class="form-control-file" id="spreadsheet">
          </div>
          <button type="submit" class="btn btn-info">Import</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
{{-- @section('styles')
 <link rel="stylesheet" href="{{asset('css/dist/dropzone.css')}}" type="text/css">
@stop --}}
@section('scripts')
@include('includes.userTinymce')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script> --}}

    <script>
         $(document).ready( function () {
            $('#table_id').DataTable();


            // show company input form
            $('.display').click(function(){
               $('.company').toggleClass('hidden');
            });

            // validate input client form input
            $(".client").validate({
              rules : {
                firstname : "required",
                email : {
                 required : true,
                 email : true,
                },
              },
              messages : {
                firstname : "Please specify First Name",
                email : {
                  required : "Please specify email",
                },
              },
              submitHandler: function(form) {
                  form.submit();
                }
            });

        } );
    </script>
@stop
