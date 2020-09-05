@extends('userdashboard')

<link href="{{asset('css/setting.css')}}" rel="stylesheet">
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Setting</h6>
      <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-3">
          </div>
          <div class="col-md-6 d-flex flex-row-reverse bd-highlight">      
          </div>
      </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="settings-list">
                    <ul class="list-group">
                        <li class="list-group-item "> 
                            <div class="settings-block-header">
                                <div class="settings-list_item-column">
                                    <div class="flex-box">
                                        <h4 class="card-title ">Global Setting</h4>
                                        <p class="text-muted">Applied to your entire account</p>
                                    </div>
                                </div>  
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/account') }}">
                            <strong ><i class="fas fa-address-card mr-1  pr-1"></i>Account & Subscription</strong>
                            <p class="text-muted">
                                Login, password, subscription and billing information
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-house-user mr-1  pr-1"></i>Companies</strong>
                            <p class="text-muted">
                                Add more companies, edit details, branding and GDPR.

                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-users mr-1  pr-1"></i>Users</strong>
                            <p class="text-muted">
                                Add more users to your account.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-user-plus mr-1  pr-1"></i>Refer a Friend</strong>
                            <p class="text-muted">
                                Refer a friend and get AUD $5 off.
                            </p>
                        </a>
                        </li>
                      </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="settings-list">
                    <ul class="list-group">
                        <li class="list-group-item "> 
                            <div class="settings-block-header">
                                <div class="settings-list_item-column">
                                    <div class="flex-box">
                                        <div class="company-img">
                                             <i class="fi fi-company"></i>
                                        </div>
                                        <h4 class="card-title ">Company Setting</h4>
                                        <p class="text-muted">Applied to <strong>{{auth()->user()->name}}</strong> only</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a href=""  class="btn btn-outline-secondary">Edit company</a>
                                    
                                </div>
                            </div>
                          
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-money-bill-alt mr-1  pr-1"></i>Currency & Taxes</strong>
                            <p class="text-muted">
                                View currency, change tax name and tax rate.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-envelope-square mr-1  pr-1"></i>Email Settings</strong>
                            <p class="text-muted">
                                Set up email, email signature and notifications.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-calendar-alt mr-1  pr-1"></i>Date, Time & Calendar</strong>
                            <p class="text-muted">
                                Google Calendar integration, date and time format.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-money-bill mr-1  pr-1"></i>Payment Methods</strong>
                            <p class="text-muted">
                                Set up how your invoices are paid.

                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-money-check-alt mr-1  pr-1"></i>Payment Schedule & Reminders</strong>
                            <p class="text-muted">
                                Set up your invoice payment terms and reminders.
                            </p>
                        </a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-images mr-1  pr-1"></i>Products & Packages</strong>
                            <p class="text-muted">
                                Create products and packages that you sell.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-address-book mr-1  pr-1"></i>Contact Form</strong>
                            <p class="text-muted">
                                Create and embed contact forms.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-sliders-h mr-1  pr-1"></i>Work Flows</strong>
                            <p class="text-muted">
                                Create workflows and automation.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-laptop-house mr-1  pr-1"></i>Job Types</strong>
                            <p class="text-muted">
                                Set up job types and link them to workflows.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-envelope-open-text mr-1  pr-1"></i>Email Templates</strong>
                            <p class="text-muted">
                                Customise your email templates.
                            </p>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                            <strong ><i class="fas fa-tags mr-1  pr-1"></i>labels</strong>
                            <p class="text-muted">
                                Rename "Main Shoot" and "Business Number"
                            </p>
                        </a>
                        </li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
  </div>
@endsection