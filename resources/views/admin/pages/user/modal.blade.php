<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.store') }}" method="POST">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control rounded-4 @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control rounded-4 @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{ old('email') }}" autocomplete="email">
            <label for="email">Email</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="role" class="form-control rounded-4 @error('role') is-invalid @enderror" id="role" placeholder="role" value="{{ old('role') }}" autocomplete="role">
            <label for="role">Role</label>
            @error('role')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating mb-2">
            <input type="password" name="password" class="form-control m-0 @error('password') is-invalid @enderror" id="password" placeholder="Password" autocomplete="new-password">
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>  
          <div class="form-floating mb-2">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="floatingPasswordConfirmation" placeholder="Password Confirmation" autocomplete="new-password">
            <label for="floatingPasswordConfirmation">Password Confirmation</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-flex">
            <button class="w-50 mb-2 mx-1 btn btn-lg rounded-4 btn-secondary" type="reset" data-dismiss="modal">Cancel</button>
            <button class="w-50 mb-2 mx-1 btn btn-lg rounded-4 btn-primary" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- <div class="modal fade py-5" id="modalRegister" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="fw-bold mb-0">Register User</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        
      </div>
    </div>
  </div>
</div> --}}

<!-- Modal Delete-->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div>
          Are you sure delete this data ??
        </div>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          <form action="" id="delete-btn" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger ml-2">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>