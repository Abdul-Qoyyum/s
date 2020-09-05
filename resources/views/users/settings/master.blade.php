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
                <li class="list-group-item"><a href="#">Currency & Taxes</a></li>
                <li class="list-group-item"><a href="#">Email Settings</a></li>
                <li class="list-group-item"><a href="#">Date, Time & Calendar</a></li>
                <li class="list-group-item"><a href="#">Payment Methods</a></li>
                <li class="list-group-item"><a href="#">Payment schedules & Reminders</a></li>
                <li class="list-group-item"><a href="#">Product & Packages</a></li>
                <li class="list-group-item"><a href="#">Contact Form</a></li>
                <li class="list-group-item"><a href="#">Work Flows</a></li>
                <li class="list-group-item"><a href="#">Job Types </a></li>
                <li class="list-group-item"><a href="#">Email Templates</a></li>
                <li class="list-group-item"><a href="#">labels</a></li>
              </ul>
        </div>
        <div class="col-md-9 ">
            @yield('Settingcontent')
        </div>
    </div>


@endsection