@extends('admin.layouts.app')
@section('title', 'Article')
@section('content')
    <div class="card p-3">
      <h1>User Data</h1>
      <span>
        <button type="button" class="btn btn-primary my-2 btn-register" data-toggle="modal" data-target="#modalRegister">
          Register
        </button>
      </span>
      <table id="table-id" class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Register Date</th>
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
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
              <td>
                <div class="btn btn-danger btn-delete" data-id="{{ route('user.destroy', $item->id) }}" data-toggle="modal" data-target="#modalDelete">
                  Delete
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@include('admin.pages.user.modal')
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
@if ($errors->any())
<script>
  $(function() {
      $('.btn-register').click();
  });
</script>
@endif
@endpush