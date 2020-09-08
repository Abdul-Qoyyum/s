@extends('dashboard')
@section('content')
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>
            </div>
            <div class="card-body">
                  {!! Form::model($post,['route'=> ['posts.update',$post->slug],'files'=>true,'method'=>'PATCH']) !!}
                  <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title',null,['class'=>'form-control font-weight-bold','placeholder'=>'Title']) !!}
                  </div>
                  <div class="form-group">
                    {{-- {!! Form::label('url', 'Thumbnail') !!}
                    {!! Form::file('url',['class'=>'form-control-file']) !!} --}}
                    <label for="url">Thumbnail</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-light">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="thumbnail" class="form-control" type="text" name="url">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">

                  </div>

                  <div class="form-group">
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::text('body',null,['class'=>'form-control my-editor','placeholder'=>'Title']) !!}
                  </div>

                  <div class="form-group">
                    <div class="d-flex justify-content-end">
                      <a href="{{ route('posts.index') }}" class="btn btn-danger mr-1">Cancel</a>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                  {!! Form::close() !!}
            </div>
  </div>
@endsection
@section('scripts')
<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: ".my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);

   $('#lfm').filemanager('image');

</script>
@endsection
