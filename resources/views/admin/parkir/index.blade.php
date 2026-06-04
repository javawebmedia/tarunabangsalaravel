

<div class="row">
	<div class="col-md-12">
		<div class="card mb-2 mt-2">
			<div class="card-header bg-body-secondary">
				<strong><i class="bi bi-plus-circle-fill"></i> INPUT DATA KENDARAAN PARKIR</strong>
			</div>
			<div class="card-body bg-warning-subtle">
				<form action="{{ url('admin/parkir/proses-tambah') }}" method="post" accept-charset="utf-8">
					<div class="row g-3 align-items-stretch">

						<div class="col-md-9">
							<div class="row">
								<div class="col-md-12 mb-2">
									<div class="form-floating">
										<select name="id_jenis_kendaraan" class="form-control">
											<?php foreach ($JenisKendaraan as $row) {?>
												<option value="<?php echo $row->id_jenis_kendaraan ?>" <?php if($row->status_default=='Ya') { echo 'selected'; } ?>>
													<?php echo $row->nama_jenis_kendaraan ?> - <?php echo $row->keterangan ?>
												</option>
											<?php } ?>
										</select>
										<label>Jenis Kendaraan</label>
									</div>
								</div>

								<div class="col-md-12 mb-2">
									<div class="form-floating">
										<select name="id_pintu_parkir" class="form-control">
											<?php foreach($PintuMasuk as $row) { ?>
												<option value="<?php echo $row->id_pintu_parkir ?>">
													<?php echo $row->nama_pintu_parkir ?> - <?php echo $row->keterangan ?>
												</option>
											<?php } ?>
										</select>
										<label>Pintu Masuk</label>
									</div>
								</div>

								<div class="col-md-4 mb-2">
									<div class="form-floating">
										<input type="date" 
										name="tanggal_masuk" 
										id="tanggal_masuk" 
										class="form-control" 
										placeholder="Tanggal masuk" value="<?php echo date('Y-m-d') ?>">
										<label>Tanggal Masuk</label>
									</div>
								</div>

								<div class="col-md-4 mb-2">
									<div class="form-floating">
										<input type="time" 
										name="jam_masuk" 
										id="jam_masuk" 
										class="form-control" 
										placeholder="Jam masuk" value="<?php echo date('H:i') ?>">
										<label>Jam Masuk</label>
									</div>
								</div>

								<script>
									function updateJamMasuk() {
										const now = new Date();

										const jam   = String(now.getHours()).padStart(2, '0');
										const menit = String(now.getMinutes()).padStart(2, '0');

									    // format HH:MM
										const waktu = `${jam}:${menit}`;

										document.getElementById('jam_masuk').value = waktu;
									}

									// jalankan pertama kali
									updateJamMasuk();

									// update setiap 1 detik
									setInterval(updateJamMasuk, 1000);
								</script>

								<div class="col-md-4 mb-2">
									<div class="form-floating">
										<input type="text" 
										name="nomor_polisi" 
										class="form-control text-uppercase" 
										placeholder="Nomor Kendaraan">
										<label>Nomor Polisi</label>
									</div>
								</div>

							</div>
						</div>

						
						<div class="col-md-3 d-flex">
							<button type="submit" name="submit" 
							value="tambah" 
							id="tambah" 
							class="btn btn-primary w-100 h-100">
							<i class="bi bi-plus-circle-fill"></i> Simpan 
						</button>
					</div>


				</div>
			</form>


		</div>
	</div>
</div>

<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-body-secondary">
				<strong><i class="bi bi-p-circle-fill"></i> DATA KENDARAAN PARKIR</strong>
			</div>
			<div class="card-body">
				<form action="{{ url('admin/parkir') }}" method="get" accept-charset="utf-8" class="bg-body-secondary border-secondary p-3 rounded mb-2">
					<div class="input-group">
						<select name="status_bayar" class="form-control">
							<option value="Semua">Semua Status</option>
							<option value="Belum" <?php if(isset($_GET['status_bayar']) && $_GET['status_bayar'] == 'Belum') { echo 'selected'; } ?>>Belum Bayar</option>
							<option value="Sudah" <?php if(isset($_GET['status_bayar']) && $_GET['status_bayar'] == 'Sudah') { echo 'selected'; } ?>>Sudah Bayar</option>
						</select>
						<input type="date" class="form-control" name="tanggal_masuk" placeholder="Tanggal masuk" value="<?php if(isset($_GET['tanggal_masuk'])) { echo $_GET['tanggal_masuk']; }else{ echo date('Y-m-d'); } ?>">

						<input type="date" class="form-control" name="tanggal_keluar" placeholder="Tanggal masuk" value="<?php if(isset($_GET['tanggal_keluar'])) { echo $_GET['tanggal_keluar']; }else{ echo date('Y-m-d'); } ?>">

						<input type="text" class="form-control" name="keywords" placeholder="Cari..." aria-label="Cari..." aria-describedby="button-addon1" value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>">

						<button class="btn btn-success" type="submit" name="cari" value="Cari" id="button-addon1">
							<i class="bi bi-search"></i> Cari
						</button>
						<?php if(count($_GET) > 0) { ?>
							<a href="{{ url('admin/parkir') }}" class="btn btn-secondary">
								<i class="bi bi-arrow-left"></i> Kembali
							</a>
						<?php } ?>

					</div>
				</form>


				<div class="mt-3">
				    {{ $dataParkir->links() }}
				</div>
				<!-- tabel -->
				<table class="table table-bordered table-striped">
				    <thead>
				        <tr>
				            <th>No</th>
				            <th>Informasi</th>
				            <th>No Polisi &amp; Tiket</th>
				            <th>Masuk</th>
				            <th>Keluar</th>
				            <th>Durasi</th>
				            <th>Tarif</th>
				            <th>Total</th>
				            <th>Status Bayar</th>
				            <th></th>
				        </tr>
				    </thead>
				    <tbody>
				        <?php $no= 1; foreach($dataParkir as $row) { ?>
				        <tr>
				            <td class="text-center">{{ $no }}</td>
				            <td><strong>{{ $row->jenisKendaraan->nama_jenis_kendaraan ?? '-' }}</strong>
				                <br>
				                <small class="text-secondary">				                    
				                    Gate Masuk:
				                    {{ $row->pintuParkir->nama_pintu_parkir ?? '-' }}
				                    <br>
				                    Gate Keluar:
				                    {{ $row->pintuKeluar->nama_pintu_parkir ?? '-' }}
				                </small>
				            </td>
				            <td>{{ $row->nomor_polisi }}
				            	<br>No Tiket: {{ $row->kode_parkir }}
				            </td>
				            <td>@if($row->tanggal_masuk)
				                    {{ \Carbon\Carbon::parse($row->tanggal_masuk)->format('d-m-Y') }}

				                    <br>
				                    <small>
				                        Jam:
				                        {{ \Carbon\Carbon::parse($row->tanggal_masuk)->format('H:i:s') }}
				                    </small>
				                @endif
				            </td>
				            <td>
				                @if($row->tanggal_keluar)
				                    {{ \Carbon\Carbon::parse($row->tanggal_keluar)->format('d-m-Y') }}
				                    <br>
				                    <small>
				                        Jam:
				                        {{ \Carbon\Carbon::parse($row->tanggal_keluar)->format('H:i:s') }}
				                    </small>
				                @else
				                    -
				                @endif
				            </td>
				            <td>
				                {{ $row->durasi_hari ?? 0 }} Hari
				                <br>
				                <small class="text-secondary">
				                    {{ $row->durasi_jam ?? 0 }} Jam
				                    {{ $row->durasi_menit ?? 0 }} Menit
				                </small>
				            </td>
				            <td>{{ number_format($row->harga_harian ?? 0, 0, ',', '.') }}</td>
				            <td>{{ number_format($row->total_bayar ?? 0, 0, ',', '.') }}</td>
				            <td>
				                @if($row->status_bayar == 'Sudah')
				                    <span class="badge text-bg-success">
				                        <i class="bi bi-check-circle-fill"></i>
				                        {{ $row->status_bayar }}
				                    </span>
				                @else
				                    <span class="badge text-bg-secondary">
				                        <i class="bi bi-x-circle-fill"></i>
				                        {{ $row->status_bayar }}
				                    </span>
				                @endif
				            </td>

				            <td>
				            	<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-<?php echo $row->id_parkir ?>">
									 <i class="bi bi-box-arrow-right"></i> Keluar
									</button>
				                <a href="{{ url('admin/parkir/delete/'.$row->id_parkir) }}" class="btn btn-sm btn-secondary delete-link" >
										<i class="bi bi-trash-fill"></i>
									</a>
				            </td>
				        </tr>
				        
				        <?php $no++; } ?>

				    </tbody>
				</table>
				<!-- end tabel -->

				<?php foreach($dataParkir as $row) { ?>

					<form action="{{ url('admin/parkir/proses-edit') }}" method="post" accept-charset="utf-8">
						<!-- Modal -->
						<div class="modal fade" id="edit-<?php echo $row->id_parkir ?>" tabindex="-1" aria-labelledby="edit-<?php echo $row->id_parkir ?>" aria-hidden="true">
						  <div class="modal-dialog modal-xl">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h1 class="modal-title fs-5" id="exampleModalLabel">Keluar Parkiran: <?php echo $row->kode_parkir ?></h1>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      <div class="modal-body">

						      	<input type="hidden" name="id_parkir" value="<?php echo $row->id_parkir ?>">
						      	<input type="hidden" name="id_jenis_kendaraan" value="<?php echo $row->id_jenis_kendaraan ?>">
						        
						        <table class="table table-striped">
						        	<tbody>
						        		<tr>
						        			<td width="30%">Nomor Polisi</td>
						        			<td><?php echo $row->nomor_polisi ?></td>
						        		</tr>
						        		<tr>
						        			<td>Jenis Kendaraan</td>
						        			<td><?php echo $row->JenisKendaraan->nama_jenis_kendaraan ?></td>
						        		</tr>
						        		<tr>
						        			<td>Pintu Masuk</td>
						        			<td><?php echo $row->pintuParkir->nama_pintu_parkir ?></td>
						        		</tr>
						        		<tr>
						        			<td>Pintu Keluar</td>
						        			<td>
						        				<select name="id_pintu_keluar" class="form-control">
								        			<?php foreach($PintuKeluar as $rowKeluar) {?>
									        			<option value="<?php echo $rowKeluar->id_pintu_parkir ?>"  <?php if($row->id_pintu_keluar==$rowKeluar->id_pintu_parkir) { echo 'selected'; } ?>>
									        				<?php echo $rowKeluar->nama_pintu_parkir ?> - <?php echo $rowKeluar->keterangan ?>
									        			</option>
									        		<?php } ?>
								        		</select>
						        			</td>
						        		</tr>
						        		<tr>
						        			<td>Tanggal jam Masuk</td>
						        			<td>
						        				<div class="row g-2">
												  <div class="col-md">
												    <div class="form-floating">
												      <input type="date" class="form-control" id="floatingInputGrid<?php echo $row->id_parkir ?>" placeholder="Tanggal masuk" name="tanggal_masuk" value="<?php echo date('Y-m-d',strtotime($row->tanggal_masuk)) ?>">
												      <label for="floatingInputGrid<?php echo $row->id_parkir ?>">Tanggal Masuk</label>
												    </div>
												  </div>
												  <div class="col-md">
												    <div class="form-floating">
												      <input type="time" class="form-control" id="floatingInputGrid<?php echo $row->id_parkir+1 ?>" placeholder="Jam masuk" name="jam_masuk" value="<?php echo date('H:i',strtotime($row->tanggal_masuk)) ?>">
												      <label for="floatingInputGrid<?php echo $row->id_parkir+1 ?>">Jam Masuk</label>
												    </div>
												  </div>
												</div>
						        			</td>
						        		</tr>
						        		
						        		<tr>
						        			<td>Tanggal jam Keluar</td>
						        			<td>
						        				<div class="row g-2">
												  <div class="col-md">
												    <div class="form-floating">
												      <input type="date" class="form-control" id="Keluar<?php echo $row->id_parkir ?>" placeholder="Tanggal keluar" name="tanggal_keluar" value="<?php echo date('Y-m-d') ?>">
												      <label for="Keluar<?php echo $row->id_parkir ?>">Tanggal keluar</label>
												    </div>
												  </div>
												  <div class="col-md">
												    <div class="form-floating">
												      <input type="time" class="form-control" id="Keluar<?php echo $row->id_parkir+1 ?>" placeholder="Jam keluar" name="jam_keluar" value="<?php echo date('H:i') ?>">
												      <label for="Keluar<?php echo $row->id_parkir+1 ?>">Jam keluar</label>
												    </div>
												  </div>
												</div>

						        				
						        			</td>
						        		</tr>
						        	</tbody>
						        </table>
						        

						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						        <button type="submit" name="submit" value="update" class="btn btn-primary">
						        	<i class="bi bi-box-arrow-right"></i> Ya, Keluarkan dari Tempat Parkir
						        </button>
						      </div>
						    </div>
						  </div>
						</div>
					</form>

				<?php } ?>
			</div>
		</div>
	</div>
</div>
