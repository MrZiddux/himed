@extends('admin.layouts.app')
@section('title', 'Update Article')
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
  <form action="{{ route('article.update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" name="status" value="update">
    <div class="row">
      <div class="col-4 pl-0">
        <div class="card p-3">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $data->title }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Tags</label>
              @php
                $tags = explode('|', $data->tags);
              @endphp
            <select class="select-tags form-control multiselect" name="tags[]" multiple="multiple">
              @for ($i = 0; $i < count($tags); $i++)
                <option value="{{ $tags[$i] }}" selected="selected">{{ $tags[$i] }}</option>
              @endfor
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="file" name="thumbnail" class="dropify" data-default-file="{{ asset('images/uploads/articles/' .$data->thumbnail ) }}"/>
          </div>
          <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $data->author }}">
          </div>
        </div>
      </div>
      <div class="col-8 m-0 p-0">
        <div class="card p-2 m-0">
          <div class="mb-3">
            <textarea class="editor" name="content">
              {{ $data->content }}  
            </textarea>
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