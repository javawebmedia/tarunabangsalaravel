<form action="{{ url('admin/user/proses-edit') }}" method="post" accept-charset="utf-8">
	@csrf

<input type="hidden" name="id_user" value="{{ $user->id_user }}">
	        
<div class="row mb-3">
	<label class="col-md-3">Nama</label>
	<div class="col-md-9">
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama',$user->nama) }}">
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Email</label>
	<div class="col-md-9">
		<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email',$user->email) }}">
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Username</label>
	<div class="col-md-9">
		<input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username',$user->username) }}">
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Password</label>
	<div class="col-md-9">
		<input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
		<small class="text-danger">Ketik minimal 6 dan maksimal 32 karakter atau biarkan kosong jika tidak ingin mengganti password.</small>
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Level</label>
	<div class="col-md-9">
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="User" {{ old('akses_level', $user->akses_level) == 'User' ? 'selected' : '' }}>User</option>
		</select>
	</div>
</div>

 <div class="row mb-3">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<a href="{{ url('admin/user') }}" class="btn btn-secondary">Kembali</a>
		<button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan Data</button>
	</div>
</div>
</form>