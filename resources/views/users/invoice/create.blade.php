@extends('userdashboard')
@section('content')

{!! Form::open(['route' => 'invoice.store']) !!}

 <div class="card">
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Invoice ID</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="invoice_id"  id="invoice_id" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Issue date</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control"  name="issue_date"  id="issue_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">PO Number</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="po_number" id="po_number">
                         <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </div>
              </div>
            </div>


            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="#">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="#">Browse Illustrations on unDraw &rarr;</a>
                </div>
              </div>


            </div>
          </div>

                        <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-body">
                 <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Product/Package</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>{!! Form::textarea('description', null, ['class'=>'form-control notes']) !!}</td>
                        <td>{!! Form::number('price',null,['class'=>'form-control','step'=>'0.01']) !!}</td>
                        <td>{!! Form::number('quantity',null,['class'=>'form-control','step'=>'1']) !!}</td>
                        <td>{!! Form::number('amount',null,['class'=>'form-control','step'=>'0.01']) !!}</td>
                        <td>{!! Form::select('size', ['L' => 'Large', 'S' => 'Small'],null,['class'=>'form-control-sm']) !!}</td>
                        <td>scvds</td>
                        <td>dcd</td>
                      </tr>
                    </tbody>
                  </table>
                </div>




                </div>
            </div>

 </div>


{!! Form::close() !!}
@stop
@section('scripts')
@include('includes.userTinymce')
@stop
