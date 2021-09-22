@extends('admin.layouts.app')
@section('title', 'Article')
@section('content')
    <div class="card p-3">
      <table id="table-id" class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Date</th>
                <th>Author</th>
                <th>Tags</th>
                <th>Handle</th>
            </tr>
        </thead>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach ($data as $item)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
              <td>{{ $item->author }}</td>
              <td>{{ str_replace('|', ', ', $item->tags) }}</td>
              <td>
                <a href="{{ route('article.edit', $item->slug) }}" class="btn btn-success mr-1">Edit</a>
                <div class="btn btn-primary" onclick="alert('Belum ada Halaman detail artikel, si ziyad gk ada kabar')">View</div>
                <div class="btn btn-danger btn-delete" data-id="{{ route('article.show', $item->id) }}" data-toggle="modal" data-target="#modalDelete">
                  Delete
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @include('admin.pages.article.modal')
@endsection
@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
@endpush
@push('script')
<script src="{{ asset('admin/vendor/jQuery/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table-id').DataTable();
    $('.btn-delete').click(function() {
      $('#delete-btn').attr('action', $(this).attr('data-id'));
    });
  } );
</script>
@endpush