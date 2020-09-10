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

    <h5>Currency</h5>
    <select class="custom-select form-group @error('currency') is-invalid @enderror" name="currency"  required autocomplete="currency">
                            
                            <option selected value="{{ old('currency') }}">Currency</option>
                            <option value="EUR">Euro</option>
                            <option value="GBP">United Kingdom Pounds</option>
                            <option value="DZD">Algeria Dinars</option>
                            <option value="ARP">Argentina Pesos</option>
                            <option value="AUD">Australia Dollars</option>
                            <option value="ATS">Austria Schillings</option>
                            <option value="BSD">Bahamas Dollars</option>
                            <option value="BBD">Barbados Dollars</option>
                            <option value="BEF">Belgium Francs</option>
                            <option value="BMD">Bermuda Dollars</option>
                            <option value="BRR">Brazil Real</option>
                            <option value="BGL">Bulgaria Lev</option>
                            <option value="CAD">Canada Dollars</option>
                            <option value="CLP">Chile Pesos</option>
                            <option value="CNY">China Yuan Renmimbi</option>
                            <option value="CYP">Cyprus Pounds</option>
                            <option value="CSK">Czech Republic Koruna</option>
                            <option value="DKK">Denmark Kroner</option>
                            <option value="NLG">Dutch Guilders</option>
                            <option value="XCD">Eastern Caribbean Dollars</option>
                            <option value="EGP">Egypt Pounds</option>
                            <option value="FJD">Fiji Dollars</option>
                            <option value="FIM">Finland Markka</option>
                            <option value="FRF">France Francs</option>
                            <option value="DEM">Germany Deutsche Marks</option>
                            <option value="XAU">Gold Ounces</option>
                            <option value="GRD">Greece Drachmas</option>
                            <option value="HKD">Hong Kong Dollars</option>
                            <option value="HUF">Hungary Forint</option>
                            <option value="ISK">Iceland Krona</option>
                            <option value="INR">India Rupees</option>
                            <option value="IDR">Indonesia Rupiah</option>
                            <option value="IEP">Ireland Punt</option>
                            <option value="ILS">Israel New Shekels</option>
                            <option value="ITL">Italy Lira</option>
                            <option value="JMD">Jamaica Dollars</option>
                            <option value="JPY">Japan Yen</option>
                            <option value="JOD">Jordan Dinar</option>
                            <option value="KRW">Korea (South) Won</option>
                            <option value="LBP">Lebanon Pounds</option>
                            <option value="LUF">Luxembourg Francs</option>
                            <option value="MYR">Malaysia Ringgit</option>
                            <option value="MXP">Mexico Pesos</option>
                            <option value="NLG">Netherlands Guilders</option>
                            <option value="NZD">New Zealand Dollars</option>
                            <option value="NOK">Norway Kroner</option>
                            <option value="PKR">Pakistan Rupees</option>
                            <option value="XPD">Palladium Ounces</option>
                            <option value="PHP">Philippines Pesos</option>
                            <option value="XPT">Platinum Ounces</option>
                            <option value="PLZ">Poland Zloty</option>
                            <option value="PTE">Portugal Escudo</option>
                            <option value="ROL">Romania Leu</option>
                            <option value="RUR">Russia Rubles</option>
                            <option value="SAR">Saudi Arabia Riyal</option>
                            <option value="XAG">Silver Ounces</option>
                            <option value="SGD">Singapore Dollars</option>
                            <option value="SKK">Slovakia Koruna</option>
                            <option value="ZAR">South Africa Rand</option>
                            <option value="KRW">South Korea Won</option>
                            <option value="ESP">Spain Pesetas</option>
                            <option value="XDR">Special Drawing Right (IMF)</option>
                            <option value="SDD">Sudan Dinar</option>
                            <option value="SEK">Sweden Krona</option>
                            <option value="CHF">Switzerland Francs</option>
                            <option value="TWD">Taiwan Dollars</option>
                            <option value="THB">Thailand Baht</option>
                            <option value="TTD">Trinidad and Tobago Dollars</option>
                            <option value="TRL">Turkey Lira</option>
                            <option value="VEB">Venezuela Bolivar</option>
                            <option value="ZMK">Zambia Kwacha</option>
                            <option value="EUR">Euro</option>
                            <option value="XCD">Eastern Caribbean Dollars</option>
                            <option value="XDR">Special Drawing Right (IMF)</option>
                            <option value="XAG">Silver Ounces</option>
                            <option value="XAU">Gold Ounces</option>
                            <option value="XPD">Palladium Ounces</option>
                            <option value="XPT">Platinum Ounces</option>
                            <select name="">
                        </select>
                        @error('currency')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              <h5>Tax</h5>
              <div class="form-group">
                            <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" placeholder="GST">
                            @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
              <label for="quantity">Tax rate:</label>
          <input type="number" id="quantity" name="quantity" min="1" max="100"><br><br>
          <button type="submit" ng-disabled="button_disable" class="btn btn-success btn-lg m-30 ng-isolate-scope spinning-wheel spinning-wheel__display-before" spinning-wheel="" is-spinning-wheel-active="isSaveSpinnningWheelActive">
            Save Currency &amp; Taxes
          </button>
  <!--</form> -->
    </div>


     
    </div>




@endsection