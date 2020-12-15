@extends('admin.layouts.master')

@section('css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('js')
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
@endsection

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.layouts.topbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Content</th>
                      <th>Author</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Created_at</th>
                      <th>Updated_at</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Content</th>
                      <th>Author</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Created_at</th>
                      <th>Updated_at</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($articles as $article)  
                    <tr style="height: 10%;">
                      <td>{{ $article->title }}</td>
                      <td>{!! Illuminate\Support\Str::words($article->description, 10) !!}</td>
                      <td>{!! Illuminate\Support\Str::words($article->content, 10) !!}</td>
                      <td>{{ $article->author }}</td>
                      <td>{{ $article->getCategory->name }}</td>
                      <td><img src="{{ asset('uploads/thumbnail_'.$article->image_url) }}" alt="photo" width="120" height="90"></td>
                      <td>{{ $article->created_at }}</td>
                      <td>{{ $article->updated_at }}</td>
                      <td>
                          <a href="{{ route('articles.view', $article->id) }}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">
                              <i class="fa fa-edit"></i>
                          </a>
                          <a href="{{ route('articles.delete', $article->id) }}" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                          </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
@endsection