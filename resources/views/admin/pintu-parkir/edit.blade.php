<form action="{{ url('admin/jenis-kendaraan/proses-edit') }}" method="post" accept-charset="utf-8">
	@csrf

<input type="hidden" name="id_jenis_kendaraan" value="{{ $pintuParkir->id_jenis_kendaraan }}">
	        
<div class="row mb-3">
	<label class="col-md-3">Nama</label>
	<div class="col-md-9">
		<input type="text" name="nama_jenis_kendaraan" class="form-control" placeholder="Nama" value="{{ old('nama_jenis_kendaraan',$pintuParkir->nama_jenis_kendaraan) }}">
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Durasi Parkir</label>
	<div class="col-md-4">
		<input type="number" name="durasi_parkir_gratis" class="form-control" placeholder="Durasi Parkir Gratis" value="{{ old('durasi_parkir_gratis',$pintuParkir->durasi_parkir_gratis) }}">
		<small class="text-secondary">Durasi parkir gratis (menit)</small>
	</div>
	<div class="col-md-4">
		<input type="number" name="durasi_parkir_harian" class="form-control" placeholder="Durasi Parkir Harian" value="{{ old('durasi_parkir_harian',$pintuParkir->durasi_parkir_harian) }}">
		<small class="text-secondary">Durasi parkir harian (jam)</small>
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Tarif Parkir</label>
	
	<div class="col-md-4">
		<input type="number" name="tarif_perjam" class="form-control" placeholder="Tarif perjam" value="{{ old('tarif_perjam',$pintuParkir->tarif_perjam) }}">
		<small class="text-secondary">Tarif perjam</small>
	</div>
	<div class="col-md-5">
		<input type="number" name="tarif_harian" class="form-control" placeholder="Tarif Harian" value="{{ old('tarif_harian',$pintuParkir->tarif_harian) }}">
		<small class="text-secondary">Tarif Harian</small>
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Keterangan</label>
	<div class="col-md-9">
		<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan',$pintuParkir->Keterangan) }}</textarea>
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Urutan</label>
	<div class="col-md-9">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan',$pintuParkir->urutan) }}">
	</div>
</div>

<div class="row mb-3">
	<label class="col-md-3">Level</label>
	<div class="col-md-9">
		<select name="status_default" class="form-control">
			<option value="Ya">Ya</option>
			<option value="Tidak" {{ old('status_default', $pintuParkir->status_default) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
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