<div class="login-box">
      <div class="login-logo">
        <a href="{{ url('login') }}"><b>SMK</b> TARUNA BANGSA</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Login dengan username dan password Anda.</p>

          <form action="{{ url('login/proses') }}" method="post">
          @csrf

            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Username" />
              <div class="input-group-text">
                <span class="bi bi-person-fill"></span>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password" />
              <div class="input-group-text">
                <span class="bi bi-lock-fill"></span>
              </div>
            </div>
            <!--begin::Row-->
            <div class="row">
              <div class="col-8">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>

          <hr>
          
          <p class="mb-3 mt-3 text-center">
            Kembali ke <a href="{{ url('/') }}">Beranda</a> 
            | Lupa password? <a href="{{ url('reset') }}">Reset</a>
          </p>
          
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->