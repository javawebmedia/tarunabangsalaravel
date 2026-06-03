<form action="{{ url('admin/user/proses-tambah') }}" method="post" accept-charset="utf-8">
	@csrf
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengguna Baru</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        
	        <div class="row mb-3">
	        	<label class="col-md-3">Nama</label>
	        	<div class="col-md-9">
	        		<input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama') }}">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Email</label>
	        	<div class="col-md-9">
	        		<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Username</label>
	        	<div class="col-md-9">
	        		<input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Password</label>
	        	<div class="col-md-9">
	        		<input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Level</label>
	        	<div class="col-md-9">
	        		<select name="akses_level" class="form-control">
	        			<option value="Admin">Admin</option>
	        			<option value="User" {{ old('akses_level') == 'User' ? 'selected' : '' }}>User</option>
	        		</select>
	        	</div>
	        </div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan Data</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>