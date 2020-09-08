@extends('userdashboard')
@section('content')


<!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="my-auto font-weight-bold text-primary">Payments Overview</h4>
             
              <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-5 d-flex flex-row-reverse bd-highlight">
                      <div class="col-md-6">
                        <h2 class="h2">$42201</h2>
                        <div>
                            <span> Total Due</span>
                        </div>
                      </div>
                      <div data-toggle="modal" data-target="#exportpayment">
                        <button type="button" class="btn btn-primary " >Export Payments</button>
                      </div>
                        
                  </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive"  cellspacing="0">
                <table id="table_id" class="table">
                    <thead>
                      <tr>
                        <th class="">Status</th>
                        <th class="">Due</th>
                        <th class="">Invoice ID</th>
                        <th class="">Client</th>
                        <th class="">Job</th>
                        <th class="">Amount</th>
                        <th class="">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><button type="button" class="btn btn-outline-primary btn-sm m-0 waves-effect" >Unpaid</button></td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td><button type="button" class="btn btn-primary btn-sm m-0 waves-effect" data-toggle="modal" data-target="#exampleModalCenter">Record Payment</button></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                </table>

              </div>
            </div>
          </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Reocrd Payment</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" class="form">
              <label for=""><strong>Payment</strong></label>
              <input type="text" name="price" placeholder="$4569.6" class="form-control validate">
              <br>
              <label for=""><strong>Paid On</strong></label>
              <input type="datetime" name="date" placeholder="$4569.6" class="form-control validate">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-md btn-success spinning-wheel mt-10 spinning-wheel__display-after">Save changes</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exportpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Export Payments</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-auto">
          <form action="" class="form ">
              <label for=""><strong>Type of Payment</strong></label>
              <br>
              <select class="custom-select">
                <option selected>All payments</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <br>
              <label for=""><strong>Filter By</strong></label>
              <br>
              <select class="custom-select">
                <option selected>Issue date</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <br>
              <label for=""><strong>Paid On</strong></label>
              <br>
              <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-sm py-2 btn-secondary ">30 Days</button>
                    <button type="button" class="btn btn-sm btn-secondary s-12">Mtd</button>
                    <button type="button" class="btn btn-sm btn-secondary s-12">Ytd</button>
                    <button type="button" class="btn btn-sm btn-secondary s-12">All Time</button>
                  </div>
              </div>
            <div id="datepicker" class=" col-md-6 md-form md-outline input-with-post-icon datepicker" inline="true">
                    <input placeholder="Select date" type="text" id="example" class="form-control">
                    <label for="example">Try me...</label>
                    <i class="fas fa-calendar input-prefix"></i>
                </div>
            </div>

              <label for=""><strong>Columns</strong></label>
              <!-- Default unchecked -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkall">
                    <label class="custom-control-label" for="checkall">Select All</label>
                        <div class="form-row">
                          <div class="col ml-5">
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="status">
                                <label class="custom-control-label" for="checkall">Status</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="invoice">
                                <label class="custom-control-label" for="checkall">Invoice ID</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="issue_date">
                                <label class="custom-control-label" for="checkall">Issue Date</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="send_date">
                                <label class="custom-control-label" for="checkall">Send Date</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="due_date">
                                <label class="custom-control-label" for="checkall">Due Date</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="paid_date">
                                <label class="custom-control-label" for="checkall">PaidDate</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="client_name">
                                <label class="custom-control-label" for="checkall">Client Name</label>
                            </div>
                          </div>
                          <div class="col">
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="client_email">
                                <label class="custom-control-label" for="checkall">Client Email</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="job_name">
                                <label class="custom-control-label" for="checkall">Job Name</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="job_status">
                                <label class="custom-control-label" for="checkall">Job Status</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="main_date">
                                <label class="custom-control-label" for="checkall">Main Shoot Date</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="total">
                                <label class="custom-control-label" for="checkall">Total Amount</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="tax">
                                <label class="custom-control-label" for="checkall">Tax Amount</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input checkSingle" id="currency">
                                <label class="custom-control-label" for="checkall">Currency</label>
                            </div>
                          </div>
                        </div>
                </div>
              <label for=""><strong>File Format</strong></label>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="xls">
                <label class="custom-control-label" for="xls">XLS </label>
                
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="CSV">
                <label class="custom-control-label" for="CSV">CSV </label>     
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-md btn-success spinning-wheel mt-10 spinning-wheel__display-after">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
@include('includes.userTinymce')
    <script>
       $(document).ready(function () {
            $('#table_id').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
    <script>
        $(document).ready(function() {
    $("#checkall").change(function() {
        if (this.checked) {
            $(".checkSingle").each(function() {
                this.checked=true;
            });
        } else {
            $(".checkSingle").each(function() {
                this.checked=false;
            });
        }
    });

    $(".checkSingle").click(function () {
        if ($(this).is(":checked")) {
            var isAllChecked = 0;

            $(".checkSingle").each(function() {
                if (!this.checked)
                    isAllChecked = 1;
            });

            if (isAllChecked == 0) {
                $("#checkall").prop("checked", true);
            }     
        }
        else {
            $("#checkall").prop("checked", false);
        }
    });
});
    </script>
@stop
