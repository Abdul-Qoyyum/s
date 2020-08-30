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
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td></td>
            <td></td>
         </tr>
      </tbody>
   </table>

      <!-- Invoice section -->
   <header>
      <h2>INVOICE {{$invoice->invoice_id}}</h2>

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
                        <div><span>Invoice for : </span> &nbsp; <strong>{{$task->name}}</strong></div>
                        <div><span>Scheduled On :</span> &nbsp; {{\Carbon\Carbon::parse("$task->start_date")->toFormattedDateString()}}</div>
                        <div><span>Name :</span>&nbsp; {{$client->firstname}} &nbsp; {{$client->lastname}}</div>
                        <div><span>EMAIL :</span>&nbsp; <a href="{{$client->email}}">{{$client->email}}</a></div>
                        <div><span>COUNTRY :</span>&nbsp; {{$client->country}}</div>
                        <div><span>DUE DATE :</span>&nbsp; {{\Carbon\Carbon::parse("$task->end_date")->toFormattedDateString()}}</div>
                     </td>
                 </tr>
            </tbody>
              </table>
    </header>
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
            <td>{{$invoice->name}}</td>
            <td>{!! $invoice->description !!}</td>
            <td>${{$invoice->price}}</td>
            <td>{{$invoice->quantity}}</td>
            <td>${{$invoice->total}}</td>
          </tr>
          <tr>
             <td></td>
             <td></td>   
             <td></td>
            <td><strong>SUBTOTAL</strong></td>
            <td>${{$invoice->total}}</td>
          </tr>

          <tr>
             <td></td>
             <td></td>
             <td></td>
             <td><strong>TOTAL</strong></td>
             <td>${{$invoice->total}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTES:</div>
        <div class="notice">{{$invoice->notes}}</div>
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
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
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