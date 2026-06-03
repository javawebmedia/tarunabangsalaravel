<form action="{{ url('admin/jenis-kendaraan/proses-tambah') }}" method="post" accept-charset="utf-8">
	@csrf
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Baru</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        
	        <div class="row mb-3">
	        	<label class="col-md-3">Nama</label>
	        	<div class="col-md-9">
	        		<input type="text" name="nama_jenis_kendaraan" class="form-control" placeholder="Nama" value="{{ old('nama_jenis_kendaraan') }}">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Durasi Parkir</label>
	        	<div class="col-md-4">
	        		<input type="number" name="durasi_parkir_gratis" class="form-control" placeholder="Durasi Parkir Gratis" value="{{ old('durasi_parkir_gratis') }}">
	        		<small class="text-secondary">Durasi parkir gratis (menit)</small>
	        	</div>
	        	<div class="col-md-4">
	        		<input type="number" name="durasi_parkir_harian" class="form-control" placeholder="Durasi Parkir Harian" value="{{ old('durasi_parkir_harian') }}">
	        		<small class="text-secondary">Durasi parkir harian (jam)</small>
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Tarif Parkir</label>
	        	
	        	<div class="col-md-4">
	        		<input type="number" name="tarif_perjam" class="form-control" placeholder="Tarif perjam" value="{{ old('tarif_perjam') }}">
	        		<small class="text-secondary">Tarif perjam</small>
	        	</div>
	        	<div class="col-md-5">
	        		<input type="number" name="tarif_harian" class="form-control" placeholder="Tarif Harian" value="{{ old('tarif_harian') }}">
	        		<small class="text-secondary">Tarif Harian</small>
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Keterangan</label>
	        	<div class="col-md-9">
	        		<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan') }}</textarea>
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Urutan</label>
	        	<div class="col-md-9">
	        		<input type="number" name="urutan" class="form-control" placeholder="Urutan">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Level</label>
	        	<div class="col-md-9">
	        		<select name="status_default" class="form-control">
	        			<option value="Ya">Ya</option>
	        			<option value="Tidak" {{ old('status_default') == 'Tidak' ? 'selected' : '' }}>User</option>
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