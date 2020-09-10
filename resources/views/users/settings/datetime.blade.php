@extends('users.settings.master')

@section('Settingcontent')

<div class="row user-section mt-4 ">
    <div class="col-sm-6">
    <h4 _ngcontent-c8="" class="settings-section-header-title ml-2">Date, Time & Calender</h4>
    <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-white m-1 p-1">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('settings') }}">Setting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Date, Time & Calender</li>
    </ol>
  </nav>
</div>
  <div class=" col-sm-6 text-sm-right">
    <div class="clearfix  hidden visible-xs"></div>
    <button type="button" class="btn btn-success btn-add-new" data-toggle="modal" data-target="#invite-company-user-modal">
        Invite company user
    </button>
    {{-- Invite user model --}}
    <div class="modal fade bd-example-modal-lg" id="invite-company-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title " id="exampleModalLongTitle">testing user::::</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="m-5">
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2  col-form-label col-form-label-sm">contact form</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2  col-form-label col-form-label-sm">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control form-control-sm" id="colFormLabelSm" >
                    </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer ">
                <button type="submit" class="btn btn-success btn-md ng-isolate-scope spinning-wheel spinning-wheel__display-before" ng-disabled="button_disable" spinning-wheel="" is-spinning-wheel-active="isSendInviteSpinnningWheelActive">Send invitation
                </button>
            </div>
          </div>
        </div>
      </div>
</div>



</div>
<hr>
<label class="col-sm-12 mt-3 mb-3" >Invite more users to your company account. The more the merrier!</label>

<div class="Account-box mt-3 ">
    
    <div class="table-responsive">

    <div class="calendar">

      <div class="col rightCol">
        <div class="content">
          <h2 class="year">2013</h2>
          <ul class="months" style="padding-left: 12">
            <li><a href="#" title="Jan" data-value="1">Jan</a></li>
            <li><a href="#" title="Feb" data-value="2">Feb</a></li>
            <li><a href="#" title="Mar" data-value="3">Mar</a></li>
            <li><a href="#" title="Apr" data-value="4">Apr</a></li>
            <li><a href="#" title="May" data-value="5">May</a></li>
            <li><a href="#" title="Jun" data-value="6">Jun</a></li>
            <li><a href="#" title="Jul" data-value="7">Jul</a></li>
            <li><a href="#" title="Aug" data-value="8">Aug</a></li>
            <li><a href="#" title="Sep" data-value="9" class="selected">Sep</a></li>
            <li><a href="#" title="Oct" data-value="10">Oct</a></li>
            <li><a href="#" title="Nov" data-value="11">Nov</a></li>
            <li><a href="#" title="Dec" data-value="12">Dec</a></li>
          </ul>
          <div class="clearfix"></div>
          <ul class="weekday">
            <li><a href="#" title="Mon" data-value="1">Mon</a></li>
            <li><a href="#" title="Tue" data-value="2">Tue</a></li>
            <li><a href="#" title="Wed" data-value="3">Wed</a></li>
            <li><a href="#" title="Thu" data-value="4">Thu</a></li>
            <li><a href="#" title="Fri" data-value="5">Fri</a></li>
            <li><a href="#" title="Say" data-value="6">Sat</a></li>
            <li><a href="#" title="Sun" data-value="7">Sun</a></li>
          </ul>
          <div class="clearfix"></div>
          <ul class="days">
            <script>
              for( var _i = 1; _i <= 31; _i += 1 ){
                var _addClass = '';
                if( _i === 12 ){ _addClass = ' class="selected"'; }
                
                switch( _i ){
                  case 8:
                  case 10:
                  case 27:
                    _addClass = ' class="event"';
                  break;
                }

                document.write( '<li><a href="#" title="'+_i+'" data-value="'+_i+'"'+_addClass+'>'+_i+'</a></li>' );
              }
            </script>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
    </div>

     
    </div>




@endsection