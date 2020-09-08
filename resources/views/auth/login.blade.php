@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
     <div class="col-md-6 ">
         <div class="card" style="background-color:#f4f5f9;">
             <div class="card-body">
              <form id="login" method="POST" action="{{ route('login') }}">
               @csrf
                <div class="form-group row justify-content-center">
                    <div style="background-image:url('{{asset('img/logo_dark.png')}}');background-repeat:no-repeat;height:70px;" class="col-md-8 login-image mb-2"></div>
                    <p style="color:#22baa1;font-size:24px;text-align:center;width:100%;">Admin Login</p>
                    <input type="email" name="email" value="{{ old('email') }}"  class="form-control col-md-8" id="email" aria-describedby="emailHelp" placeholder="Email" required autocomplete="email" autofocus>
                </div>
                <div class="form-group row justify-content-center">
                    <input type="password" class="form-control col-md-8" id="password" name="password" autocomplete="current-password" placeholder="Password" required>
                </div>

                <div class="row justify-content-center mb-3">
                   <div class="col-md-8">
                    <div class="row justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Stay signed in</label>
                        </div>
                        <div>
                                @if (Route::has('password.request'))
                                    <a  href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                        </div>
                    </div>
                   </div>
                </div>
                <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary col-md-6">Sign in to my account</button>
                </div>
                </form>
          </div>
         </div>
     </div>
   </div>
</div>
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
<script>
$("#login").submit(function(event){
    // event.preventDefault(); //prevent default action
	var post_url = $(this).attr("action"); //get form action url
	var request_method = $(this).attr("method"); //get form GET/POST method
	var form_data = $(this).serialize(); //Encode form elements for submission
 
	$.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
		url : post_url,
		type: request_method,
		data : form_data
	}).fail(function(){ //
        event.preventDefault(); //prevent default action
	});
});

    @if($errors->any())
    $.notify({
        // options
        message: @foreach($errors->all() as $error) '{{$error}}' @endforeach 
    },{
        // settings
        type: 'danger',
    });
    @endif


</script>
@stop


@endsection
