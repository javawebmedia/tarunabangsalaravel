<form action="{{ url('admin/pintu-parkir/proses-tambah') }}" method="post" accept-charset="utf-8">
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
	        		<input type="text" name="nama_pintu_parkir" class="form-control" placeholder="Nama" value="{{ old('nama_pintu_parkir') }}">
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
	        		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}">
	        	</div>
	        </div>

	        <div class="row mb-3">
	        	<label class="col-md-3">Level</label>
	        	<div class="col-md-9">
	        		<select name="jenis_pintu" class="form-control">
	        			<option value="Masuk">Masuk</option>
	        			<option value="Keluar" {{ old('jenis_pintu') == 'Keluar' ? 'selected' : '' }}>Keluar</option>
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