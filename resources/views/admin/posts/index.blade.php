@extends('userdashboard')
@section('content')
<!-- Post DataTable  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My Post</h6>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-6 d-flex flex-row-reverse bd-highlight">
                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addNew">Add Post</button>
                {{-- <button type="button" class="btn btn-info mb-1 mr-1">Export clients</button>
                <button type="button" class="btn btn-info mb-1 mr-1">Import clients</button> --}}
                </div>
            </div>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>
                  <a href="{{ route('posts.edit',$post->slug) }}" class="btn btn-info btn-circle">
                    <i class="fas fa-edit"></i>
                  </a> 
                  <a href="{{ route('posts.destroy',$post->slug) }}" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
            </tr>            
        @endforeach
    </tbody>
</table>
    </div>
  </div>
</div>



<!-- Add New Modal -->
<div class="modal fade modal_1" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="padding: 15px;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 15px 20px;">
                  {!! Form::open(['action'=> ['Admin\PostController@store']]) !!}
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
                      <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>          
                    </div>
                  </div>
                  {!! Form::close() !!}

      </div>
    </div>
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

    $(document).ready( function () {
      $('#dataTable').DataTable();
    });

</script>
@endsection