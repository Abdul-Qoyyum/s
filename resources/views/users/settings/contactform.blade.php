@extends('users.settings.master')

@section('Settingcontent')

<div class="row user-section mt-4 ">
    <div class="col-sm-6">
    <h4 _ngcontent-c8="" class="settings-section-header-title ml-2">Users</h4>
    <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-white m-1 p-1">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('settings') }}">Setting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Contact form</li>
    </ol>
  </nav>
</div>
  



</div>
<hr>
<label class="col-sm-12 mt-3 mb-3" >If you have any query, please contact us!</label>

<div class="Account-box mt-3 ">
    
      <div id="contact-form" class="contact-form">
    <h1 class="contact-form_title">Contact Form</h1>
    <div class="separator"></div>

    <div v-if="isSending" class="loading"></div>

    <form class="form" @submit="onSubmit">
      <input required name="name" v-model='contact.name' placeholder="Name" type="text" autocomplete="off">
      <input required name="email" v-model="contact.email" placeholder="E-mail" type="email" autocomplete="off">
      <textarea name="message" v-model="contact.message" rows="4" placeholder="Message"></textarea>
       <button class="button">Send</button>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>
  <script src="app.js"></script>    
</div>




@endsection