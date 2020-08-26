@extends('userdashboard')
@section('content')

{!! Form::open(['route' => 'invoice.store']) !!}

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
                        <th scope="col">Discount (%)</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{!! Form::select('packages', $packages, null, ['placeholder' => 'Choose Product/Package','class'=>'form-control packages']) !!}</th>
                        <td>{!! Form::textarea('description', null, ['class'=>'form-control notes','class'=>'description']) !!}</td>
                        <td>{!! Form::number('price',null,['class'=>'form-control','step'=>'0.01']) !!}</td>
                        <td>{!! Form::number('quantity',null,['class'=>'form-control','step'=>'1']) !!}</td>
                        <td>{!! Form::number('discount',null,['class'=>'form-control','step'=>'0.01']) !!}</td>
                        <td>{!! Form::select('tax_options', $taxes,null,['class'=>'form-control-sm tax_options','placeholder'=>'Choose Tax Options']) !!}</td>
                        <td><span class="amount">$ 0</span></td>
                        <td class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

     <hr>
                  <div class="d-flex justify-content-end">
                    <ul>
                      <li class="list-group-item">Subtotal: $<span class="subtotal">0</span></li>
                      <li class="list-group-item">GST: $<span class="gst">0</span></li>
                      <li class="list-group-item">Discount: <span class="discount">None</span></li>
                      <li class="list-group-item"><strong>Total Due</strong> $<span class="total">0</span></li>
                    </ul>
                  </div>

      <hr>                  
                  <div class="container">
                    {!! Form::label('notes', "Notes:",['class' => 'text-bold']) !!}
                    {!! Form::textarea('notes', null, ['class'=>'form-control','placeholder'=>'These are additional notes you wish to add to your invoice']) !!}
                  </div>

      <hr>
                  <div class="d-flex justify-content-between" style="background-color: #ccc;padding:15px;">
                      <div><h4><strong>Do you want to add a contract?</strong></h4></div>
                      <div>{!! Form::select('contracts', $contracts, null, ['placeholder' => "Choose Contract",'class' => "form-control"]) !!}</div>
                      <div><button type="button" class="btn btn-light"><i class="fas fa-edit mr-1"></i> Edit Contract</button></div>                    
                  </div>


      <hr>
                  {{-- <div class="d-flex justify-content-between" style="background-color: #ccc;padding:15px;">
                      <div><h4><strong>Do you want to add a contract?</strong></h4></div>
                      <div>{!! Form::select('contracts', $contracts, null, ['placeholder' => "Choose Contract",'class' => "form-control"]) !!}</div>
                      <div><button type="button" class="btn btn-light"><i class="fas fa-edit mr-1"></i> Edit Contract</button></div>                    
                  </div> --}}


                </div>
            </div>



{!! Form::close() !!}
@stop
@section('scripts')
<script>
  $(document).ready(function(){
  //  initialise tinymce
    tinymce.init({
    selector: '.description',
    });

    let res = [];

    // Get all packages
    $.get("{{route('package.all')}}",function(data, status){
        res = data.data;        
        // handle packages click events
        $('select.packages').change(function(){
          var selectedId = $(this).children("option:selected").val();
          var selectedOption =  res.filter(package => package.id == selectedId )[0];

          // set the fields values
          tinymce.get("description").setContent(selectedOption.description);
          $('input[name="price"]').val(selectedOption.price);
          $('input[name="quantity"]').val(selectedOption.quantity);
          $('input[name="discount"]').val(selectedOption.discount);
          $('.amount').text(`$ ${selectedOption.price}`);
        });

        $('select.tax_options').change(function(){
           var id = $(this).children("option:selected").val();
           var gst = 0;
           var number = 0;
           var subtotal = 0;
           var totalDiscount = 0;
           var total = 0;

           var prices = $('input[name="price"]');
           var quantities = $('input[name="quantity"]');
           var discounts = $('input[name="discount"]');
           var subtotalText = $('.subtotal');
           var gstText = $('.gst');
           var totalDiscountText = $('.discount');
           var totalText = $('.total');

          //validate function
          function validate(value){
            if(value == 0 || value < 0){
              throw new Error("Invalid Input.");
            }
          } 

          //  variable for each discount
          var discount;

           switch (id) {
             case "1": //Includes tax
               prices.each(function(index){
                  validate($(this).val());
                //  each discount
                  discount = discounts[index].value;
                  validate(discount);
                // increase total discount
                  totalDiscount += discount;
                  validate(totalDiscount);
                // increase number
                  number += quantities[index].value;
                  validate(number);
                // increase subTotal
                subtotal += $(this).val();
                validate(subtotal);
                // change total
                total = subtotal;
                                 
                  // calculate gst
                  gst += $(this).val() * discount;

               });

               gst = gst * number;
              //  display the values 
               gstText.text(gst);
               subtotalText.text(subtotal);
               totalDiscountText.text(totalDiscount);
               totalText.text(total)
               break;
             case "2": //Excludes tax
                
               break;
             default: //No tax

               break;
           }



        });


    });


  });
</script>
@stop
