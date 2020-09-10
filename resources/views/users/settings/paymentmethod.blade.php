@extends('users.settings.master')

@section('Settingcontent')

<div class="row user-section mt-4 ">
    <div class="col-sm-6">
    <h4 _ngcontent-c8="" class="settings-section-header-title ml-2">Payment Method</h4>
    <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-white m-1 p-1">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('settings') }}">Setting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Payment Method</li>
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
        <div class="row">
          <div class="flex-row flex-wrap">
            <div class="checkbox-squared mt-30 mb-25">
              <input type="checkbox" id="checkbox-squared-pay-bankTransfer" ng-model="bankPaymentMethod.active" class="ng-pristine ng-untouched ng-valid ng-empty">
              <label for="checkbox-squared-pay-bankTransfer"></label>
            </div>

            <h3>Pay by Bank Transfer</h3>
            <h3 class="flex-basis-full mb-0 mt-0">Give clear instructions to your clients about how to pay by bank transfer. </h3>
          </div>

          <div class="row top-padd">
                        <div class="col-xs-12 col-md-3 text-xs-left text-md-right">
                            <label for="name-of-methods" style="padding-top: 7px" class="control-label">
                                Instructions
                            </label>
                        </div>
                        <div class="col-xs-12 col-md-9">
              <div class="sn-ta-editor ng-isolate-scope" sn-model="bankPaymentMethod.instructions" sn-name="bank_payment_method">
                        <div class="textarea-quad">
                     
                        <text-angular ng-model="drModel" name="bank_payment_method" ta-file-drop="fileDropHandler" ta-focussed-class="focussed" ta-html-editor-class="form-content" ta-text-editor-class="form-content" ta-paste="pasteHandlerTA($html)" ng-disabled="button_disable" ta-toolbar="" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ta-root ng-empty"><div text-angular-toolbar="" name="textAngularToolbar2297474828591739" ta-focussed-class="focussed" class="ng-scope ng-isolate-scope ta-toolbar btn-toolbar"><div class="btn-group"><button type="button" class="btn btn-default ng-scope active" name="bold" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Bold" unselectable="on" disabled="disabled"><i class="fa fa-bold"></i></button><button type="button" class="btn btn-default ng-scope" name="italics" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Italic" unselectable="on" disabled="disabled"><i class="fa fa-italic"></i></button><button type="button" class="btn btn-default ng-scope" name="underline" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Underline" unselectable="on" disabled="disabled"><i class="fa fa-underline"></i></button></div><div class="btn-group"><button type="button" class="btn btn-default btn-link-edit ng-scope" name="link" tabindex="-1" on-click="executeAction($event)" ng-class="displayActiveToolClass(active)" title="Insert link" unselectable="on" disabled="disabled" ta-button="ta-button" ng-disabled="isDisabled()" ng-click="executeAction()"><i class="fa fa-link"></i></button></div><div class="btn-group"><button type="button" class="btn btn-default ng-scope" name="ul" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Unordered List" unselectable="on" disabled="disabled"><i class="fa fa-list-ul"></i></button><button type="button" class="btn btn-default ng-scope" name="ol" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Ordered List" unselectable="on" disabled="disabled"><i class="fa fa-list-ol"></i></button></div><div class="btn-group"><button type="button" class="btn btn-default ng-scope active" name="justifyLeft" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Align text left" unselectable="on" disabled="disabled"><i class="fa fa-align-left"></i></button><button type="button" class="btn btn-default ng-scope" name="justifyCenter" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Center" unselectable="on" disabled="disabled"><i class="fa fa-align-center"></i></button><button type="button" class="btn btn-default ng-scope" name="justifyRight" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Align text right" unselectable="on" disabled="disabled"><i class="fa fa-align-right"></i></button><button type="button" class="btn btn-default ng-scope" name="justifyFull" ta-button="ta-button" ng-disabled="isDisabled()" tabindex="-1" ng-click="executeAction()" ng-class="displayActiveToolClass(active)" title="Justify text" unselectable="on" disabled="disabled"><i class="fa fa-align-justify"></i></button></div></div><div class="ta-scroll-window ng-scope ta-text ta-editor form-content" ng-hide="showHtml"><div class="popover fade bottom" style="max-width: none; width: 305px;"><div class="arrow"></div><div class="popover-content"></div></div><div class="ta-resizer-handle-overlay"><div class="ta-resizer-handle-background"></div><div class="ta-resizer-handle-corner ta-resizer-handle-corner-tl"></div><div class="ta-resizer-handle-corner ta-resizer-handle-corner-tr"></div><div class="ta-resizer-handle-corner ta-resizer-handle-corner-bl"></div><div class="ta-resizer-handle-corner ta-resizer-handle-corner-br"></div><div class="ta-resizer-handle-info"></div></div><div id="taTextElement2297474828591739" contenteditable="true" ta-bind="ta-bind" ng-model="html" ta-paste="_pasteHandler($html)" class="ng-pristine ng-untouched ng-valid ta-bind ng-empty"><p><br></p></div></div><textarea id="taHtmlElement2297474828591739" ng-show="showHtml" ta-bind="ta-bind" ng-model="html" class="ng-pristine ng-untouched ng-valid ng-scope ta-bind ta-html ta-editor form-content ng-empty ng-hide"></textarea><input type="hidden" tabindex="-1" style="display: none;" name="textAngularEditor2297474828591739" value=""></text-angular>
                        <span class="editLinkTips" ng-click="showModalEditLink($event)" style="display:none;">
                        <i class="fi fi-edit"></i>Edit link
                    </span>
                    </div>
    
                    <div sn-link-data="link2edit" class="ng-isolate-scope">
                        <div id="" class="modal modal-link-editor modal-center fade" data-backdrop="false" data-keyboard="false">
                          <div class="modal-dialog">
                            <form class="modal-content ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" ng-submit="saveLink()">

                              <div class="modal-header">
                                <button type="button" class="close" ng-click="closeModal()">×</button>
                                <h3 class="modal-title">Insert or edit link</h3>
                              </div>

                              <div class="modal-body">
                                <div class="field-info">
                                  <h4>Link text</h4>
                                  <textarea class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" type="text" placeholder="Text to display" ng-model="linkData.linkTo" required="" maxlength="255" style="height: 33px; padding-top: 6px !important"></textarea>
                                </div>

                                <div class="field-info">
                                  <h4>Link to website or email address</h4>
                                  <textarea class="form-control transition-0 ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength" type="text" placeholder="Type the website url including http:// or email address here" ng-model="linkData.url" required="" maxlength="255" ng-disabled="urlLooked" style="height: 33px; padding-top: 6px !important"></textarea>
                                </div>

                              </div>

                              <div class="modal-footer modal-foot">
                                <button type="submit" class="btn btn-success btn-lg">Insert link</button>
                                <button type="button" class="btn btn-default btn-lg" ng-click="removeLink()">Remove link</button>
                              </div>

                            </form>
                          </div>
                        </div>
                        <div class="modal-link-editor__background"></div>
                    </div>
                    <!-- ngIf: isAttachment -->
                    <div class="ng-isolate-scope">
                        <div id="filesModal" class="modal modal-files-upload modal-center fade" data-backdrop="false" data-keyboard="false">
                          <div class="modal-dialog">
                            <form class="modal-content hidden-scroll ng-pristine ng-valid">

                              <div class="modal-header pt-pb-15">
                                <button type="button" class="close" ng-click="closeModal()">×</button>
                                <h3 class="modal-title">From Files</h3>
                              </div>
                              
                              <div class="modal-body flex-row section-data__wrapper" style="padding: 30px!important">
                                <!-- ngRepeat: file in allFiles | filter:id track by $index -->
                              </div>

                              <div class="modal-footer modal-foot">
                                <button type="submit" ng-click="addAttachment()" class="btn btn-success btn-lg">Attach to Email</button>
                              </div>

                            </form>
                          </div>
                        </div>
                        <div class="modal-link-editor__background"></div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
    </div>

     
    </div>




@endsection