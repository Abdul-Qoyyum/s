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
                            <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" placeholder="Company Name">
                            @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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
                        <select class="custom-select form-group @error('timezone') is-invalid @enderror" name="timezone" required autocomplete="timezone">
                            
                            <option selected value="{{ old('timezone') }}">Time Zone</option>
                           <option value="Etc/GMT+12">(GMT-12:00) International Date Line West</option>
                           <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
                           <option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
                           <option value="US/Alaska">(GMT-09:00) Alaska</option>
                           <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US & Canada)</option>
                           <option value="America/Tijuana">(GMT-08:00) Tijuana, Baja California</option>
                           <option value="US/Arizona">(GMT-07:00) Arizona</option>
                           <option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                           <option value="US/Mountain">(GMT-07:00) Mountain Time (US & Canada)</option>
                           <option value="America/Managua">(GMT-06:00) Central America</option>
                           <option value="US/Central">(GMT-06:00) Central Time (US & Canada)</option>
                           <option value="America/Mexico_City">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                           <option value="Canada/Saskatchewan">(GMT-06:00) Saskatchewan</option>
                           <option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                           <option value="US/Eastern">(GMT-05:00) Eastern Time (US & Canada)</option>
                           <option value="US/East-Indiana">(GMT-05:00) Indiana (East)</option>
                           <option value="Canada/Atlantic">(GMT-04:00) Atlantic Time (Canada)</option>
                           <option value="America/Caracas">(GMT-04:00) Caracas, La Paz</option>
                           <option value="America/Manaus">(GMT-04:00) Manaus</option>
                           <option value="America/Santiago">(GMT-04:00) Santiago</option>
                           <option value="Canada/Newfoundland">(GMT-03:30) Newfoundland</option>
                           <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                           <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires, Georgetown</option>
                           <option value="America/Godthab">(GMT-03:00) Greenland</option>
                           <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                           <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                           <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                           <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                           <option value="Africa/Casablanca">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                           <option value="Etc/Greenwich">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                           <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                           <option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                           <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                           <option value="Europe/Sarajevo">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                           <option value="Africa/Lagos">(GMT+01:00) West Central Africa</option>
                           <option value="Asia/Amman">(GMT+02:00) Amman</option>
                           <option value="Europe/Athens">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                           <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                           <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                           <option value="Africa/Harare">(GMT+02:00) Harare, Pretoria</option>
                           <option value="Europe/Helsinki">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                           <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                           <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                           <option value="Africa/Windhoek">(GMT+02:00) Windhoek</option>
                           <option value="Asia/Kuwait">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                           <option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                           <option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
                           <option value="Asia/Tbilisi">(GMT+03:00) Tbilisi</option>
                           <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                           <option value="Asia/Muscat">(GMT+04:00) Abu Dhabi, Muscat</option>
                           <option value="Asia/Baku">(GMT+04:00) Baku</option>
                           <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                           <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                           <option value="Asia/Yekaterinburg">(GMT+05:00) Yekaterinburg</option>
                           <option value="Asia/Karachi">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                           <option value="Asia/Calcutta">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                           <option value="Asia/Calcutta">(GMT+05:30) Sri Jayawardenapura</option>
                           <option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                           <option value="Asia/Almaty">(GMT+06:00) Almaty, Novosibirsk</option>
                           <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                           <option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                           <option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                           <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                           <option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                           <option value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur, Singapore</option>
                           <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                           <option value="Australia/Perth">(GMT+08:00) Perth</option>
                           <option value="Asia/Taipei">(GMT+08:00) Taipei</option>
                           <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                           <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                           <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                           <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                           <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                           <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                           <option value="Australia/Canberra">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                           <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                           <option value="Pacific/Guam">(GMT+10:00) Guam, Port Moresby</option>
                           <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                           <option value="Asia/Magadan">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                           <option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
                           <option value="Pacific/Fiji">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                           <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                        </select> 
                        @error('timezone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 

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
