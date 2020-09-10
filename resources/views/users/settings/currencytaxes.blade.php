@extends('users.settings.master')

@section('Settingcontent')

<div class="row user-section mt-4 ">
    <div class="col-sm-6">
    <h4 _ngcontent-c8="" class="settings-section-header-title ml-2">Currency Taxes</h4>
    <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-white m-1 p-1">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('settings') }}">Setting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Currency Taxes</li>
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
        <p>Tell us the currency that you trade in and your tax rates. These are applied to your quotes and invoices. If you don't charge tax, put the word None in the name field and 0% in the percentage field. Your tax settings can be changed at any time.</p>
<p style="color: red">WARNING: Once your currency has been saved, these settings cannot be changed. Don't stuff this up!</p>

    </div>

     
    </div>




@endsection