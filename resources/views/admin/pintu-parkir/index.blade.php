<p>Terdapat <strong class="text-danger"><em><?php echo count($pintuParkir) ?></em></strong> pengguna di website ini.</p>
<form action="{{ url('admin/user') }}" method="get" accept-charset="utf-8">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="keywords" placeholder="Cari pengguna..." aria-label="Nama/Email" aria-describedby="button-addon1" value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>" required>
	  <button class="btn btn-info text-white" type="submit" id="button-addon1">
	  	<i class="bi bi-search"></i> Cari
	  </button>
	  <?php if(isset($_GET['keywords'])) { ?>
	  	<a href="{{ url('admin/user') }}" class="btn btn-secondary">
	  		<i class="bi bi-arrow-left"></i> Kembali
	  	</a>
	  <?php } ?>
	  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		 <i class="bi bi-plus-circle-fill"></i> Tambah Baru
		</button>
	</div>
</form>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Keterangan</th>
			<th>Durasi Gratis</th>
			<th>Durasi Parkir Harian</th>
			<th>Tarif Perjam</th>
			<th>Tarif Harian</th>
			<th>Default</th>
			<th>Urutan</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php  $no = 1;foreach($pintuParkir as $row) { ?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td><?php echo $row->nama_jenis_kendaraan ?></td>
				<td><?php echo $row->keterangan ?></td>
				<td><?php echo $row->durasi_parkir_gratis ?> Menit</td>
				<td><?php echo $row->durasi_parkir_harian ?> Jam</td>
				<td><?php echo number_format($row->tarif_perjam) ?></td>
				<td><?php echo number_format($row->tarif_harian) ?></td>
				<td>
					<?php if($row->status_default=='Ya') { ?>
						<span class="badge text-bg-success"><i class="bi bi-check-circle-fill"></i> <?php echo $row->status_default ?></span>
					<?php }else{ ?>
						<span class="badge text-bg-secondary"><i class="bi bi-x-circle-fill"></i> <?php echo $row->status_default ?></span>
					<?php } ?>
				</td>
				<td><?php echo $row->urutan ?></td>
				<td>
					<a href="{{ url('admin/jenis-kendaraan/edit/'.$row->id_jenis_kendaraan) }}" class="btn btn-sm btn-info">
						<i class="bi bi-pencil-square"></i>
					</a>
					<a href="{{ url('admin/jenis-kendaraan/delete/'.$row->id_jenis_kendaraan) }}" class="btn btn-sm btn-secondary delete-link">
						<i class="bi bi-trash-fill"></i>
					</a>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>

@include('admin/jenis-kendaraan/tambah')