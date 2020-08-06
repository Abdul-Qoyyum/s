@extends('layouts.app')

@section('content')
<!-- my section -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body row justify-content-center">
                    <div class="col-md-10">      
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row justify-content-center mb-1">
                            <div style="background-image:url('{{asset('img/logo_dark.png')}}');background-repeat:no-repeat;height:70px;" class="col-md-8 login-image mb-2"></div>
                            <p style="color:#22baa1;font-size:24px;text-align:center;width:100%;">Admin Registration</p>
                        </div>
                        <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="First Name">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary col-md-6">Sign Up</button>                        
                        </div>

                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
