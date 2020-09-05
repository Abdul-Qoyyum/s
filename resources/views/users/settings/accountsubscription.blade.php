@extends('users.settings.master')

@section('Settingcontent')

<div class="Account-section mt-4 ml-2">
    <h4 _ngcontent-c8="" class="settings-section-header-title ml-2">Account &amp; Subscription</h4>
    <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-white m-1 p-1">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="#">Setting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Account & Subscription</li>
    </ol>
  </nav>

<hr></div>
<div class="Account-box mt-5 ml-4">
    
    <form>
        <h5 class="card-title ">Account Details</h5>
        <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">Update Your Profile Information</label>
        </div>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 offset-sm-1 col-form-label col-form-label-sm">First Name</label>
          <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" id="colFormLabelSm" >
          </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 offset-sm-1 col-form-label col-form-label-sm">Last Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control form-control-sm" id="colFormLabelSm" >
            </div>
          </div>
          <button _ngcontent-c21="" class="btn btn-success btn-submit wild spinning-wheel spinning-wheel__display-before" spinning-wheel="">Save name</button>
        
      </form>
</div>
<hr>
<div class="Account-box mt-5 ml-4">
    
    <form>
        
        <h5 class="card-title ">Change Login Email</h5>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 offset-sm-1 col-form-label col-form-label-sm">Login Email</label>
          <div class="col-sm-5">
            <input type="email" class="form-control form-control-sm" id="colFormLabelSm" >
          </div>
        </div>
       
          <button _ngcontent-c21="" class="btn btn-success btn-submit wild spinning-wheel spinning-wheel__display-before" spinning-wheel="">Save Email</button>   
      </form>
</div>
<hr>
<div class="Account-box mt-5 ml-4">
    
    <form>   
        <h5 class="card-title ">Enter New Password</h5>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 offset-sm-1 col-form-label col-form-label-sml">Password</label>
            <div class="col-sm-5">
              <input type="password" class="form-control form-control-sm" id="inputPassword3" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 offset-sm-1 col-form-label col-form-label-sml">Confirm Password</label>
            <div class="col-sm-5">
              <input type="password" class="form-control form-control-sm" id="inputPassword3" >
            </div>
        </div>
       
        <button _ngcontent-c21="" class="btn btn-success btn-submit wild spinning-wheel spinning-wheel__display-before" spinning-wheel="">Save Email</button>   
    </form>
</div>
<hr>
    <div class="Account-box mt-5 ml-4">
    <h5 class="card-title ">Subscription</h5>
    <label >Update Your Profile Information</label>
    
   
    </div>


@endsection