@extends('users.settings.master')

@section('Settingcontent')

<div class="row user-section mt-4 ">
    <div class="col-sm-6">
    <h4 _ngcontent-c8="" class="settings-section-header-title ml-2">Company Setting</h4>
    <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-white m-1 p-1">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('settings') }}">Setting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Product Packages</li>
    </ol>
  </nav>
</div>
<!--  <div class=" col-sm-6 text-sm-right">
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
                    <label for="colFormLabelSm" class="col-sm-2  col-form-label col-form-label-sm">Product Packages</label>
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

<div class="Account-box mt-3 ">
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr style="border-top: 1px solid #eee;">
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach ($packages as $package)
                        <tr>
                            <td>{{$package->id}}</td>
                            <td>{{$package->name}}</td>
                            <td>{{$package->description}}</td>
                            <td>{{$package->price}}</td>
                            <td>{{$package->quantity}}</td>
                            <td class="user-button text-right td-btn-group">
                            <button style="margin-bottom: 0; margin-top: -7px"  type="submit" class="btn btn-default " data-toggle="modal" data-target="#edit-modal"><i class="fas fa-edit"></i></button>
                            <button style="margin-bottom: 0; margin-top: -7px"  ng-click="showDeleteModal($index)" class="btn btn-delete btn btn-delete btn-delete-empty  "><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                     @endforeach
            <!-- <tr ng-repeat="user in users | orderBy" class="ng-scope">
                <td class="ng-binding">ID</td>
                <td class="ng-binding">Bronze Family Portrait Package</td>
                <td class="ng-binding"><p>The perfect starter package for families with high-resolution images.</p><ul>
                    <li>1 Hour photography session</li>
                    <li>10 High resolution digital files, retouched and ready to print</li>
                    </ul></td>
                <td class="ng-binding">995</td>
                <td class="ng-binding">1</td>
                <td class="user-button text-right td-btn-group">
                    <button style="margin-bottom: 0; margin-top: -7px"  type="submit" class="btn btn-default " data-toggle="modal" data-target="#edit-modal"><i class="fas fa-edit"></i></button>
                    <button style="margin-bottom: 0; margin-top: -7px"  ng-click="showDeleteModal($index)" class="btn btn-delete btn btn-delete btn-delete-empty  "><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>-->
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