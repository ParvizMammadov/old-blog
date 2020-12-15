@extends('admin.layouts.master')

@section('tinymce')
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">New Article</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" id="" required class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Author</label>
                  <input type="text" name="author" id="" required class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                  @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
              </div>
              <div class="form-group">
                  <label for="">Content</label>
                  <textarea name="blogcontent" id="" cols="30" rows="10" class="form-control"></textarea>
                  @error('blogcontent')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
              </div>
              <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" name="photo" src="" alt="" required class="form-control">
                  @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
              </div>
              <div class="form-group">
                  <label for="">Category</label>
                  <select name="category" id="" required class="form-control">
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <input type="submit" value="Send" class="btn btn-success">
              </div>
          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection  
