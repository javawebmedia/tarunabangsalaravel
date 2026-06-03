<div class="login-box">
      <div class="login-logo">
        <a href="{{ url('login') }}"><b>LUPA</b> PASSWORD</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Masukkan email Anda untuk mengganti password!</p>

          <form action="{{ url('proses-ganti-password') }}" method="post">
          @csrf

            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email" />
              <div class="input-group-text">
                <span class="bi bi-envelope"></span>
              </div>
            </div>
            
            <!--begin::Row-->
            <div class="row">
              
              <div class="col-12">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary w-100">Ganti Password</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>

          <hr>

          <p class="mb-3 mt-3 text-center">
            Kembali ke <a href="{{ url('/') }}">Beranda</a> 
            | Punya Akun? Silakan <a href="{{ url('login') }}">Login</a>
          </p>
          
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->