@extends('users.settings.master')

@section('Settingcontent')

<div class="row user-section mt-4 ">
    <div class="col-sm-6">
    <h4 _ngcontent-c8="" class="settings-section-header-title ml-2">Email Templates</h4>
    <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-white m-1 p-1">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('settings') }}">Setting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Email Templates</li>
    </ol>
  </nav>
</div>
  <!-- <div class=" col-sm-6 text-sm-right">
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
</div> -->



</div>
<hr>
<label class="col-sm-12 mt-3 mb-3" >Invite more users to your company account. The more the merrier!</label>

<div class="Account-box mt-3 ">
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr style="border-top: 1px solid #eee;">
                <th>ID</th>
                <th>Name</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
             @foreach ($emails as $email)
                <tr>
                    <td>{{$email->id}}</td>
                    <td>{{$email->name}}</td>
                    <td>{{$email->subject}}</td>
                    <td>{{$email->message}}</td>
                    <td class="user-button text-right td-btn-group">
                    <button style="margin-bottom: 0; margin-top: -7px"  type="submit" class="btn btn-default " data-toggle="modal" data-target="#edit-modal"><i class="fas fa-edit"></i></button>
                    <button style="margin-bottom: 0; margin-top: -7px"  ng-click="showDeleteModal($index)" class="btn btn-delete btn btn-delete btn-delete-empty  "><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
              @endforeach
            {{-- Edit button model --}}
            <div class="modal fade bd-example-modal-lg" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title " id="exampleModalLongTitle">Edit User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body m-3">
                      <form class="">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2  col-form-label col-form-label-sm">First Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                            </div>
                          </div>
                          
                      </form>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-success btn-md ng-isolate-scope spinning-wheel spinning-wheel__display-before" ng-disabled="button_disable" spinning-wheel="" is-spinning-wheel-active="isSendInviteSpinnningWheelActive">Save
                        </button>
                    </div>
                  </div>
                </div>
                
            </tbody>
        </table>
    </div>

     
    </div>




@endsection