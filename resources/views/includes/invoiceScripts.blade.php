@section('scripts')
<script>
  $(document).ready(function(){
  //  initialise tinymce
    tinymce.init({
     selector: '.contracts',
    });

    tinymce.init({
    selector: '.description',
    });


  // all contracts collection
  let contracts = [];
  // disable edit contract button
  $('.editContract').prop('disabled',true);
  // contract response
  $.get("{{route('contract.all')}}",function(data, status){
  // continue if it is a good response
    if(status == "success"){
      contracts = data.data;
      $('#contract').change(function(){
        var contractId = $(this).children("option:selected").val();
        // Only enable edit contract button if a contract is selected
        (contractId > 0) ? $('.editContract').prop('disabled',false) : $('.editContract').prop('disabled',true);
        var selectedContract = contracts.filter(contract => contract.id == contractId)[0];
        // set the contract value to field
        tinymce.get("contracts").setContent(selectedContract.body);
      });
    }
  });

// package response
    let res = [];

    // Get all packages
    $.get("{{route('package.all')}}",function(data, status){

     if(status == "success"){
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
          // set the initial price before tax
          $('input[name="subtotal"]').val(selectedOption.price);
          $('input[name="total"]').val(selectedOption.price);
          $('.subtotal').text(selectedOption.price);
          $('.total').text(selectedOption.price);
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
           var totalInput = $('input[name="total"]');
           var subTotalInput = $('input[name="subtotal"]');


          //  variable for each discount
          var discount;
          // Tax options switch statement
           switch (id) {
             case "1": //Includes tax
               prices.each(function(index){
                //  each discount
                  discount = (parseFloat(discounts[index].value) <= 0) ? 1 : parseFloat(discounts[index].value);
                // increase total discount
                  totalDiscount += discount;
                // increase number
                  eachQuantity = parseInt(quantities[index].value);
                  if(isNaN(eachQuantity)){
                     number += 1;
                  }else{
                     number += (eachQuantity <= 0) ? 1 : eachQuantity;
                  }
                  // validate(number);
                // increase subTotal
                subtotal += parseFloat($(this).val());
                subtotal = isNaN(subtotal) ? 99.99 : subtotal;
                  // change total
                  total = subtotal;
                                 
                  // calculate gst

                  gst += parseFloat($(this).val() * discount * number);

                  gst = isNaN(gst) ? 0 : gst;

               });

              //  display the values 
               gstText.text(gst);
               subtotalText.text(subtotal);
               totalDiscountText.text(totalDiscount == 1 ? "None" : totalDiscount);
               totalText.text(total);
              //  set total Input
              totalInput.val(total);
              // set subtotal input
              subTotalInput.val(subtotal);
               break;
             case "2": //Excludes tax
                prices.each(function(index){
                //  each discount
                  discount = (parseFloat(discounts[index].value) <= 0) ? 1 : parseFloat(discounts[index].value);
                // increase total discount
                  totalDiscount += discount;
                // increase number
                  eachQuantity = parseInt(quantities[index].value);
                  if(isNaN(eachQuantity)){
                     number += 1;
                  }else{
                     number += (eachQuantity <= 0) ? 1 : eachQuantity;
                  }
                // increase subTotal
                subtotal += parseFloat($(this).val());
                subtotal = isNaN(subtotal) ? 99.99 : subtotal;
                // change total
                total = subtotal;
                                 
                // calculate gst
                gst += parseFloat($(this).val() * discount * number);
                // validate gst
                gst = isNaN(gst) ? 0 : gst;


               });

              //  display the values 
               gstText.text(gst);
               subtotalText.text(subtotal);
               totalDiscountText.text(totalDiscount == 1 ? "None" : totalDiscount);
               var evalTotal = (discount == 1) ? total : total + gst;
               totalText.text(evalTotal);
                //  set total Input
                totalInput.val(evalTotal);  
                // set subtotal input
                subTotalInput.val(subtotal);
               break;
             default: //No tax
                return;
               break;
           }


        
        });
     }

    });


  });
</script>
@stop
