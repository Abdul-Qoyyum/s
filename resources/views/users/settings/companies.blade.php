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
                      <li class="breadcrumb-item active" aria-current="page">Companies</li>
                    </ol>
                </nav>
            </div>
        </div>
        
    </div>
</div>

<div class="col-md-12 mt-2 p-3">
    <h5 _ngcontent-c22 class="text-normal description-text-styles mb-20">
        Update your company logo, client portal banner and contact details, which are visible on your quotes, invoices and contracts.
    </h5>
    <hr>
</div>

<div _ngcontent-c23 class="row company-item">
    
    <div _ngcontent-c23 class="col-md-2 company-item__img-bg">
        <i _ngcontent-c23 class="fa fa-home text-dark"></i>
    </div>
    <div _ngcontent-c23 class="col-md-10 mt-2 company-item__main">
        <div _ngcontent-c23 class="company-item__main-header">
            <h3 _ngcontent-c23 class="mt-0 mb-0">Own</h3>
        </div>
        <div _ngcontent-c23 class="company-item__main-block">
            <div _ngcontent-c23 class="company-item-info">
                <div class="flex-box company-item__buttons">
                    {{-- {{ url('editcompany/'.$data->id) }} --}}
                    <a href="{{ url('editcompany/') }}" class="btn btn-success text-light mb-0 mr-10">
                        <i _ngcontent-c23 class="fa fa-edit text-light"></i>
                        Edit Company
                    </a>
                    {{-- {{ url('deletecompany/'.$data->id) }} --}}
                    <a href="{{ url('deletecompany/') }}" class="btn btn-success text-light mb-0 ml-10 p-2">
                        <i _ngcontent-c23 class="fa fa-trash text-light"></i>
                    </a>
                </div>
            </div>
        </div>       
    </div>
</div>
@endsection