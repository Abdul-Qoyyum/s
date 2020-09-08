@extends('userdashboard')

<link href="{{asset('css/setting.css')}}" rel="stylesheet">
@section('content')


    <div class="row bg-white">
        <div class="col-md-3 list-section">
            <ul class="list-group list-group-flush">
                <li class="list-group-item pt-4"><b><h5 class="f-s-16 font-weight-bold">Global Setting</h5></b></li>
                <li class="list-group-item"><a href="{{ url('/account') }}">Account & Subscription</a></li>
                <li class="list-group-item"><a href="{{ url('/company') }}">Companies</a></li>
                <li class="list-group-item"><a href="{{ url('/user') }}">Users</a></li>
                <li class="list-group-item "><a href="{{ url('/referfriend') }}">Refer a Friend</a></li>
              
                <li class="list-group-item pt-4"><b><h5 class="f-s-16 font-weight-bold">Company Setting</h5></b></li>
                <li class="list-group-item"><a href="{{ url('/currencytaxes') }}">Currency & Taxes</a></li>
                <li class="list-group-item"><a href="{{ url('/emailsettings') }}">Email Settings</a></li>
                <li class="list-group-item"><a href="{{ url('/datetime') }}">Date, Time & Calendar</a></li>
                <li class="list-group-item"><a href="{{ url('/paymentmethod') }}">Payment Methods</a></li>
                <li class="list-group-item"><a href="{{ url('/paymentschedule') }}">Payment schedules & Reminders</a></li>
                <li class="list-group-item"><a href="{{ url('/productpackages') }}">Product & Packages</a></li>
                <li class="list-group-item"><a href="{{ url('/contact') }}">Contact Form</a></li>
                <li class="list-group-item"><a href="{{ url('/workflows') }}">Work Flows</a></li>
                <li class="list-group-item"><a href="{{ url('/jobtypes') }}">Job Types </a></li>
                <li class="list-group-item"><a href="{{ url('/emailtemplates') }}">Email Templates</a></li>
                <li class="list-group-item"><a href="{{ url('/labels') }}">labels</a></li>
              </ul>
        </div>
        <div class="col-md-9 ">
            @yield('Settingcontent')
        </div>
    </div>


@endsection