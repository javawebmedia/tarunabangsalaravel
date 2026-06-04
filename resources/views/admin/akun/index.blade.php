<div class="row">
	<!-- Profile sidebar -->
	<div class="col-md-3">
		<!-- About card -->
		<div class="card">
			<div class="card-body text-center">
				<div
				class="rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center mb-3"
				style="width: 96px; height: 96px; font-size: 2rem"
				aria-hidden="true"
				>
				{{ mb_strtoupper(mb_substr($user->nama, 0, 1)) }}
			</div>
			<h3 class="h5 mb-0">{{ $user->nama }}</h3>
			<p class="text-secondary mb-3">{{ $user->akses_level }}</p>
			<ul class="list-group list-group-flush text-start small">
				<li class="list-group-item d-flex justify-content-between px-0">
					<span class="text-secondary">Email</span>
					<span class="fw-semibold">{{ $user->email }}</span>
				</li>
				<li class="list-group-item d-flex justify-content-between px-0">
					<span class="text-secondary">Username</span>
					<span class="fw-semibold">{{ $user->username }}</span>
				</li>
				<li class="list-group-item d-flex justify-content-between px-0">
					<span class="text-secondary">Created at</span>
					<span class="fw-semibold">{{ $user->created_at }}</span>
				</li>
				<li class="list-group-item d-flex justify-content-between px-0">
					<span class="text-secondary">Updated at</span>
					<span class="fw-semibold">{{ $user->updated_at }}</span>
				</li>
			</ul>
			
		</div>
	</div>
</div>
	<div class="col-md-9">
	<!-- About details -->
	<div class="card">
		<div class="card-header bg-body-secondary">
			<h3 class="card-title">UPDATE PROFIL</h3>
		</div>
		<div class="card-body small">

			<form action="{{ url('admin/akun/proses-edit') }}" method="post" accept-charset="utf-8">
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
					<label class="col-md-3">Level</label>
					<div class="col-md-9">
						<input type="text" name="akses_level" class="form-control disabled bg-body-secondary" placeholder="Level" value="{{ old('akses_level',$user->akses_level) }}" readonly>
					</div>
				</div>

				<div class="row mb-3">
					<label class="col-md-3">Username</label>
					<div class="col-md-9">
						<input type="text" name="username" class="form-control disabled bg-body-secondary" placeholder="Username" value="{{ old('username',$user->username) }}" readonly>
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
					<label class="col-md-3"></label>
					<div class="col-md-9">
						<a href="{{ url('admin/user') }}" class="btn btn-secondary">Kembali</a>
						<button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan Data</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
