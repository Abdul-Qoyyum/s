@extends('userdashboard')
@section('content')

{!! Form::model($invoice,['route' => ['invoice.update',$invoice->id],'method' => 'PATCH']) !!}

          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-5 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="invoice_id" class="col-sm-4 col-form-label">Invoice ID</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="invoice_id"  id="invoice_id" value="{{Str::replaceArray('-',['',''],\Carbon\Carbon::now()->toDateString())}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="issue_date" class="col-sm-4 col-form-label">Issue date</label>
                        <div class="col-sm-6">
                        {!! Form::date('issue_date', \Carbon\Carbon::now(), ['class'=>'form-control','id'=>'issue_date']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="po_number" class="col-sm-4 col-form-label">PO Number</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="po_number" id="po_number">
                        </div>
                    </div>
                </div>
              </div>
            </div>


            <div class="col-lg-7 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-body row">
                              <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="text-left"><i class="fas fa-briefcase mr-2"></i><span class="job">Job</span></h2>
                </div>
                    <div class="card-body">
                    <h4>{{$task->name}}</h4>
                    <div class="row mb-2">
                        <div class="col">Type :</div>
                        <div class="col">{{$job->name}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">Workflow :</div>
                        <div class="col">{{$workflow->name}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">Main shoot :</div>
                        <div class="col">{{$task->start_date}}</div>
                    </div>
                  
                </div>
              </div>


            </div>

            <!-- Client -->
            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="text-left"><i class="fas fa-user mr-2"></i><span class="job">Client</span></h2>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                                <div>{{$client->firstname}} (Primary)</div>
                                <div>{{$client->email}}</div>
                        </div>
                    </div>
                  
                </div>
              </div>
            </div>
            <!-- End client section -->
                </div>
              </div>


            </div>
          </div>

        <!-- Product / Package -->
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
                        <th scope="col">Discount (%)</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Amount</th>
                        {{-- <th scope="col">Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{!! Form::select('package_id', $packages, null, ['placeholder' => 'Choose Product/Package','class'=>'form-control packages']) !!}</th>
                        <td>{!! Form::textarea('description', null, ['class'=>'form-control notes','class'=>'description']) !!}</td>
                        <td>{!! Form::number('price',null,['class'=>'form-control','step'=>'0.01']) !!}</td>
                        <td>{!! Form::number('quantity',null,['class'=>'form-control','step'=>'1']) !!}</td>
                        <td>{!! Form::number('discount',null,['class'=>'form-control','step'=>'0.01']) !!}</td>
                        <td>{!! Form::select('option_id', $taxes,null,['class'=>'form-control-sm tax_options','placeholder'=>'Choose Tax Options']) !!}</td>
                        <td><span class="amount">$ 0</span></td>
                        {{-- <td class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></td> --}}
                      </tr>
                    </tbody>
                  </table>
                </div>
                {!! Form::hidden('task_id', $task->id) !!}
     <hr>
                  <div class="d-flex justify-content-end">
                    <ul>
                      <li class="list-group-item">Subtotal: $<span class="subtotal">0</span></li>
                      <li class="list-group-item">GST: $<span class="gst">0</span></li>
                      <li class="list-group-item">Discount: <span class="discount">None</span></li>
                      <li class="list-group-item"><strong>Total Due</strong> $<span class="total">0</span></li>
                    </ul>
                    {!! Form::hidden('subtotal', 99.99) !!}
                    {!! Form::hidden('total', 99.99) !!}
                  </div>

      <hr>                  
                  <div class="container">
                    {!! Form::label('notes', "Notes:",['class' => 'text-bold']) !!}
                    {!! Form::textarea('notes', null, ['class'=>'form-control','placeholder'=>'These are additional notes you wish to add to your invoice']) !!}
                  </div>

<hr>
                  <div class="row justify-content-between" style="background-color: #ccc;padding:15px;">
                      <div class="col-md-4 mb-2"><h5><strong>Do you want to assign a payment schedule to this invoice?</strong></h5></div>
                      <div class="col-md-4 mb-2">{!! Form::select('payment_schedule', [], null, ['placeholder' => "None",'class' => "form-control","disabled"=>true]) !!}</div>
                      <div class="col-md-4 mb-2"></div>                    
                  </div>

      <hr>
                  <div class="row justify-content-between" style="background-color: #ccc;padding:15px;">
                      <div class="col-md-4 mb-2"><h5><strong>Do you want to add a contract?</strong></h5></div>
                      <div class="col-md-4 mb-2">{!! Form::select('contract_id', $contracts, null, ['placeholder' => "Choose Contract",'class' => "form-control",'id'=>'contract']) !!}</div>
                      <div class="col-md-4 mb-2"><button type="button" class="btn btn-light editContract" data-toggle="modal" data-target="#editContract"><i class="fas fa-edit mr-1"></i> Edit Contract</button></div>                    
                  </div>


                <hr>
                  <div class="row" style="background-color: #ccc;padding:15px;">
                      <div class="col-md-4"><h4><strong>Do you want to add a questionnaire?</strong></h4></div>
                      <div class="col-md-4">{!! Form::select('questionaire_id', $questionaires, null, ['placeholder' => "Choose Questionaire",'class' => "form-control"]) !!}</div>
                      <div class="col-md-4"></div>                    
                  </div>

                  
        <hr>
        <div>
          <button type="submit" class="btn btn-success">Update Invoice</button>
          <a href="{{route('jobs.show',$task->id)}}" class="btn btn-light">Cancel</a>
        </div>


        <!-- Edit Contract Modal --> 
        <div class="modal fade" id="editContract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-align" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Contract</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="notes">Contract terms and conditions</label>
                        <textarea name="contracts" rows="8" cols="80" class="form-control contracts"></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" id="profile">Save Contract</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




                </div>
            </div>



{!! Form::close() !!}
@stop
@include('includes.invoiceScripts')
