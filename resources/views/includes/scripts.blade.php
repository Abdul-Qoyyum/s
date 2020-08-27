@section('scripts')
@include('includes.userTinymce')
    <script>
       $(document).ready(function(){
        
            // show company input form
            $('#display').click(function(){
               $('.company').toggleClass('hidden');
            });

            // show company input form
            $('.display').click(function(){
               $('.company').toggleClass('hidden');
            });

            //validate task input 
            $('#task').validate({
              rules : {
                name : "required"
              },
              messages : {
                name : "Please Specify Job Name"
              },
              submitHandler : function(form){
                form.submit();
              }
            });



            // validate input client form input
            $("#client").validate({
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
                var profile = $('#profile');
                // Add spinner to the profile button
                 profile.html(`<div class="spinner-border text-black" role="status">
                  <span class="sr-only">Loading...</span>
                </div><span class="w-50 h-80 ml-2 align-middle">Loading...</span>`);
                 profile.prop("disabled", true);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType:'json',
                        data : $(form).serialize(),
                        url : "{{route('jobs.client')}}",
                        success : function (data) {
                          console.log(data);
                          // reset the button
                          profile.html("Save Client Profile");
                          profile.prop("disabled", false);
                          // continue if there is a data response
                           if(typeof data == "object"){
                            $('#addClient').modal('toggle');
                            // grab the custormer's id...
                            // $("input[name='client_id']").val(`${data.id}`);
                            // Attach details to the select input field
                            $("select[name='client_id']").append(`<option value="${data.id}"> 
                                       (${data.firstname}) &nbsp; ${data.email}
                                  </option>`);
                            // set the return value as selected
                            $(`option[value="${data.id}"]`).attr('selected','selected');

                            // put the response email in the task eamil field
                            $('.clientEmail').val(data.email);
                            // disable the email field
                            // $('.clientEmail').prop('disabled',true);
                           }
                        },
                        error : function(){
                            // reset the button
                            profile.html("Save Client Profile");
                            profile.prop("disabled", false);
                        }
                    });

                }
            });

       });


    </script>
@endsection