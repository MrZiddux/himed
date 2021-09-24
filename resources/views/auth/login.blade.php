<x-applayout title="Login">
  <div class="container-fluid py-3">
    <div class="container">
      <div class="row justify-content-center align-items-center h-60vh">
        <div class="col-4">
          <div class="card border-0 shadow-md">
            <div class="card-header bg-white border-0 py-3">
              <h5 class="t-color-primary t-semibold m-0 text-center">Login</h5>
            </div>
            <div class="card-body py-4">
              <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" autocomplete="email">
                  <label for="floatingInput">Email address</label>
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" autocomplete="new-password">
                  <label for="floatingPassword">Password</label>
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <button type="submit" class="btn bg-color-primary text-white hover-btn-color-primary transition mx-auto d-block">Submit</button>
              </form
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-applayout>