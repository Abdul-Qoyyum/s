@extends('userdashboard')
@section('styles')
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">    
@endsection
@section('content')
<div class="card">
   <div class="card-body">
   <table class="table" style="margin-bottom: 50px;">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Due</th>
            <th scope="col">Paid on</th>
            <th scope="col">Amount</th>
            <th scope="col">Actions</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         </tr>
      </tbody>
   </table>

<div class="mb-3 w-100">
   <button type="button" class="btn btn-light"><i class="fa fa-send-o mr-2"></i>Send Quote</button>
   <a href="{{route('quote.preview',$quote->id)}}" target="_blank" class="btn btn-light"><i class="fa fa-eye mr-2" aria-hidden="true"></i> Preview</a>
   <a href="{{route('quote.edit',$quote->id)}}" class="btn btn-light"><i class="fas fa-edit mr-2"></i>Edit</a>
   <a href="{{route('quote.download',$quote->id)}}" class="btn btn-light"><i class="fa fa-file-pdf-o mr-2" aria-hidden="true"></i>Save As PDF</a>
   {!! Form::open(['route'=>['quote.destroy',$quote->id],'method'=>'DELETE','class'=>"form-inline"]) !!}
   <button type="submit" class="btn btn-light mt-2"><i class="fa fa-trash mr-2" aria-hidden="true"></i> Delete</button> 
   {!! Form::close() !!}
</div>

      <!-- quote section -->
      <div class="row">
          <div class="col-md-6">
            <h2>Quote {{$quote->quote_id}}</h2>
            <p>{{$quote->body}}</p>
          </div>
      </div>

      <table class="table table-striped">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%" style="text-align: left;">
                        Seller
                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0 party-header" style="text-align: left;">
                        Client
                    </th>
                </tr>
            </thead>
             <tbody>
                 <tr>
                     <td class="px-0" style="text-align: left;">
                        <div>{{$user->name}}</div>
                        <div><a href="mailto:{{$user->email}}">{{$user->email}}</a></div>
                     </td>
                     <td class="border-0"></td>
                     <td class="px-0" style="text-align: left;">
                        <div><span>Quote for : </span> &nbsp; <strong>{{$task->name}}</strong></div>
                        <div><span>Scheduled On :</span> &nbsp; {{\Carbon\Carbon::parse("$task->start_date")->toFormattedDateString()}}</div>
                        <div><span>Name :</span>&nbsp; {{$client->firstname}} &nbsp; {{$client->lastname}}</div>
                        <div><span>EMAIL :</span>&nbsp; <a href="{{$client->email}}">{{$client->email}}</a></div>
                        <div><span>COUNTRY :</span>&nbsp; {{$client->country}}</div>
                        <div><span>DUE DATE :</span>&nbsp; {{\Carbon\Carbon::parse("$task->end_date")->toFormattedDateString()}}</div>
                     </td>
                 </tr>
            </tbody>
              </table>
    <main>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Product / Package</th>
            <th scope="col">Description</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$quote->name}}</td>
            <td>{!! $quote->description !!}</td>
            <td>${{$quote->total}}</td>
            <td>{{$quote->quantity}}</td>
            <td>${{$quote->total}}</td>
          </tr>
          <tr>
             <td></td>
             <td></td>   
             <td></td>
            <td><strong>SUBTOTAL</strong></td>
            <td>${{$quote->total}}</td>
          </tr>

          <tr>
             <td></td>
             <td></td>
             <td></td>
             <td><strong>TOTAL</strong></td>
             <td>${{$quote->total}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTES:</div>
        <div class="notice">{{$quote->notes}}</div>
      </div>
    </main>

   <table class="table" style="margin-top: 50px;">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Due</th>
            <th scope="col">Paid on</th>
            <th scope="col">Amount</th>
            <th scope="col">Actions</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         </tr>
      </tbody>
      </table>


<hr>
                  <div class="row justify-content-between" style="background-color: #ccc;padding:15px;">
                      <div class="col-md-4 mb-2"><h5><strong>Payment Schedule</strong></h5></div>
                      <div class="col-md-4 mb-2">
                         {!! Form::text('payment_schedule', null, ['placeholder' => "25% Deposit + 75% due 14 days before Main Shoot Date",'class' => "form-control","disabled"=>true]) !!}
                        </div>
                      <div class="col-md-4 mb-2"></div>                    
                  </div>

<hr>
                  <div class="row justify-content-between" style="background-color: #ccc;padding:15px;">
                      <div class="col-md-4 mb-2"><h5><strong>Contract</strong></h5></div>
                      <div class="col-md-4 mb-2">{!! Form::text('contract_id', null, ['placeholder' => "Sample Wedding Contract",'class' => "form-control",'id'=>'contract','disabled'=>true]) !!}</div>
                      <div class="col-md-4 mb-2"></div>                    
                  </div>


<hr>
                  <div class="row" style="background-color: #ccc;padding:15px;">
                      <div class="col-md-4"><h4><strong>Questionnaire</strong></h4></div>
                      <div class="col-md-4">{!! Form::text('questionaire_id', null, ['placeholder' => "None",'class' => "form-control",'disabled'=>true]) !!}</div>
                      <div class="col-md-4"></div>                    
                  </div>




   </div>
</div>

@endsection