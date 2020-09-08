@extends('users.settings.master')

@section('Settingcontent')

<div class="Account-section mt-4 ml-2">
    <h4 _ngcontent-c8="" class="settings-section-header-title ml-2">Refer a Friend </h4>
    <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-white m-1 p-1">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('settings') }}">Setting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Refer a Friend</li>
    </ol>
  </nav>

<hr>
<label class="col-sm-12 mt-3 mb-3" >Work your way towards a free subscription by inviting your friends to subscribe to Studio Ninja using your unique promo code!!</label>
<hr>
<div class="Account-box mt-5 ">
    <div class="col-md-8 settings-cell flex-row flex-wrap flex-50 flex-item-xs">
        <h5 class="mt-4 mb-30">
            <b>Referral promo code: <span class="text-success text-nowrap ng-binding ">Promocodefromdb</span>
            </b></h5>
        <p class="text-muted f-s-14">
            For every friend that subscribes with your code, we will take <strong>AUD $5 off your subscription and AUD $5 off theirs every month!
            </strong> Refer 6 friends and enjoy a free Studio Ninja account.
            Your discount applies for any period of time that your friend(s) are subscribed to Studio Ninja.
        </p>
        <section class="flex-row flex-wrap flex-align-self-end">
            <h5 class="mt-30"><b>Share your referral promo code</b></h5>
           
            <textarea id="myInput" type="text" rows="4"  readonly class="form-control-plaintext bg-white">Hello friends! Use this promo code: AVSO75J4AN5H35 and get AUD $5 off your monthly subscription to the world's most user-friendly photography business software, Studio Ninja!"
            </textarea>
            
        <button onclick="myFunction()"  type="button" class="btn btn-lg btn-default  btn-outline-secondary mt-5 mb-4 flex-item-to-right ng-scope ng-isolate-scope spinning-wheel spinning-wheel__display-before  "data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Copy to clipboard
        </button>
        
        </section>

    </div>
</div>
</div>
@endsection
<script>
    function myFunction() {
    var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999); 
}

</script>