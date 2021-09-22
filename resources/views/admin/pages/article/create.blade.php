@extends('admin.layouts.app')
@section('title', 'Create Article')
@section('content')
@if ($errors->any())
<div class="card p-3 w-100">
  <div class="alert alert-danger m-0" role="alert">
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
</div>
@endif
<div class="col-12">
  <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="status" value="store">
    <div class="row">
      <div class="col-4 pl-0">
        <div class="card p-3">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tags</label>
            <select class="select-tags form-control multiselect" name="tags[]" multiple="multiple" required>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="file" name="thumbnail" class="dropify" required/>
          </div>
          <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="admin" required>
          </div>
        </div>
      </div>
      <div class="col-8 m-0 p-0">
        <div class="card p-2 m-0">
          <div class="mb-3">
            <textarea class="editor" name="content">{{ old('content') }}</textarea>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn bg-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendor/ckeditor/styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendor/dropify/dropify.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('script')
<script src="{{ asset('admin/vendor/jQuery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/ckeditor/build/ckeditor.js') }}"></script>
<script src="{{ asset('/admin/vendor/ckeditor/render.js') }}"></script>
<script src="{{ asset('/admin/vendor/dropify/dropify.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.dropify').dropify();
    $('.select-tags').select2({
      tags: true,
      placeholder: "Type tags article here",
    });
  });
</script>
@endpush
	</body>
</html>