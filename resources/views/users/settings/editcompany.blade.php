@extends('users.settings.master')

@section('Settingcontent')

<div class="col-md-12 mt-5">
    <div class="bc-wrap">
        <div class="flex-box flex-just-space">
            <div>
                <div>
                    <h2 class="settings-section-header-title mb-0">Companies</h2>
                </div>
                <div class="mb-2">
                    <button class="btn btn-success float-right">Add New Company</button>
                </div>
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb bg-white m-1 p-1">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('settings') }}">Setting</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('company') }}">Companies</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-6 main">
        <p class="font-weight-normal">Your company details below will appear on your quotes, invoices and contracts. They are also visible to your clients in the Client Portal</p>
        <div class="form">
            <form action="">
                <div class="form-group">
                    <label for="">Company Name</label>
                    <input type="text" class="form-control" id="companyname" name="company" placeholder="Enter Company name">
                  </div>
                  <div class="form-group">
                    <label for="b_no">Business Number</label>
                    <input type="text" class="form-control" id="" name="business_no"  placeholder="Enter Your ABN,rn,CRN">
                  </div>
                  <div class="form-group">
                    <label for="street">Street Address</label>
                    <input type="text" class="form-control" id="" name="street"  placeholder="Enter Your Street Address">
                  </div>
                  <div class="form-group">
                    <label for="city">City/Suburb</label>
                    <input type="text" class="form-control" id="" name="city"  placeholder="Enter Your City or Suburb">
                  </div>
                  <div class="form-group">
                    <label for="country">State/Country</label>
                    <input type="text" class="form-control" id="" name="state"  placeholder="Enter State or Country">
                  </div>
                  <div class="form-group">
                    <label for="zip-code">Postcode/Zip</label>
                    <input type="text" class="form-control" id="" name="zipcode"  placeholder="Enter Postcode or Zip">
                  </div>
                  <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="" name="country"  placeholder="Enter Your Country">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="" name="phone"  placeholder="Enter Your Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="email">Company Email</label>
                    <input type="email" class="form-control" id="" name="email"  placeholder="Enter Your Company Email e.g. info@email.com">
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Save Company Details</button>
            </form>   
    </div>

    
    </div>
    <div class="col-md-6">
        <p class="lead font-weight-bold">GDPR Features</p>
        <p class="font-weight-lighter">Enable if you have clients in the European Union. GDPR features will give you the ability to add opt-in consent checkboxes to your Contact Form, Contract Templates and Questionnaire Templates</p>
        <hr class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <p class="lead font-weight-bold">Logo</p>
                <div class="row">
                    <div class="col-md-8">
                        <p class="font-weight-lighter">Your logo must be at least 300px on the shortest side. Ideal size is 900px by 450px (RGB). Acceptable file formats are JPG and PNG. Max file size 2mb.</p>
                        <button _ngcontent-c12 class="btn btn-import btn-success btn-sm mt-0 text-white" type="file">Upload</button>
                    </div>
                    <div _ngcontent-c12 class="col-md-4 item-media">
                        <div _ngcontent-c12 class="drop-zone flex-box flex-just-center" style="height: 150px; min-width: 150px; max-width: 150px;" >
                        <input _ngcontent-c13  type="file" name="logo" id="upload" accept="image/jpeg, image/png" class="d-none" onchange="readURL(this);">
                        <img src="{{ asset('img/upload.png') }}" alt="" id="imageResult" srcset="" class="mt-3 p-3" style="width: 100%" >
                        </div>
                    </div>
                     
                </div>
            </div>
           
        </div>
        <hr class="mt-5">

        <div class="row">
            <div class="col-md-12">
                <p class="lead font-weight-bold">Client Portal Banner</p>
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-weight-lighter">Your banner size is 1540px by 300px. Acceptable file formats are JPG and PNG. max file size 5mb.</p>
                        <button _ngcontent-c12 class="btn btn-import btn-success btn-sm mt-0 text-white" type="file">Upload</button>
                    </div>
                    <div _ngcontent-c12 class="col-md-6 item-media">
                        <div _ngcontent-c12 class="drop-zone flex-box flex-just-center" style="height: 150px; min-width: 250px; max-width: 150px;">
                        <input _ngcontent-c13 type="file" name="logo" id="logo" accept="image/jpeg, image/png" class="d-none">
                        <img src="{{ asset('img/upload.png') }}" alt="" srcset="" class="mt-3 p-3" style="width: 100%">
                        </div>
                    </div>
                     
                </div>
            </div>
           
        </div>
        <hr class="mt-5">
    </div>

</div>

@endsection