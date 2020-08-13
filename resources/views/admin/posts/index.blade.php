@extends('dashboard')
@section('content')
<!-- Post DataTable  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My Post</h6>
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

@endsection
@section('scripts')
    <script>
    $(document).ready( function () {
      $('#dataTable').DataTable();
    });
    </script>
@endsection