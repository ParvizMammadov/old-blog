@extends('admin.layouts.master')

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
            <h1 class="h3 mb-0 text-gray-800">Delete Article</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <form action="{{ route('articles.destroy', $article->id) }}" method="post">
              @csrf
              @method('delete')
              <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" id=""  class="form-control" value="{{ $article->title }}" readonly>
              </div>
              <div class="form-group">
                  <label for="">Author</label>
                  <input type="text" name="author" id=""  class="form-control" value="{{ $article->author }}" readonly>
              </div>
              <div class="form-group">
                  <label for="">Description</label>
                  <div>
                      {!! $article->description !!}
                  </div>
                  <!-- @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
              </div>
              <div class="form-group">
                  <label for="">Content</label>
                  <div>
                      {!! $article->content !!}
                  </div>
                  <!-- @error('blogcontent')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
              </div>
              <div class="form-group">
                  <label for="">Image</label>
                  <img src="{{ asset('uploads/thumbnail_'.$article->image_url) }}" alt="Couldn't load image">
                  <!-- @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
              </div>
              <div class="form-group">
                  <label for="">Category</label>
                  <input type="text" name="category" id="" class="form-control" value="{{ $article->getCategory->name }}" readonly>
              </div>
              <div class="form-group">
                  <input type="submit" value="Delete" class="btn btn-danger">
              </div>
          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection  
