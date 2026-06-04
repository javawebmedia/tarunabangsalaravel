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
			<th>Jenis</th>
			<th>Urutan</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php  $no = 1;foreach($pintuParkir as $row) { ?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td><?php echo $row->nama_pintu_parkir ?></td>
				<td><?php echo $row->keterangan ?></td>
				<td>
					<?php if($row->jenis_pintu=='Masuk') { ?>
						<span class="badge text-bg-success"><i class="bi bi-box-arrow-in-up"></i> <?php echo $row->jenis_pintu ?></span>
					<?php }else{ ?>
						<span class="badge text-bg-warning"><i class="bi bi-box-arrow-down"></i> <?php echo $row->jenis_pintu ?></span>
					<?php } ?>
				</td>
				<td><?php echo $row->urutan ?></td>
				<td>
					<a href="{{ url('admin/pintu-parkir/edit/'.$row->id_pintu_parkir) }}" class="btn btn-sm btn-info">
						<i class="bi bi-pencil-square"></i>
					</a>
					<a href="{{ url('admin/pintu-parkir/delete/'.$row->id_pintu_parkir) }}" class="btn btn-sm btn-secondary delete-link">
						<i class="bi bi-trash-fill"></i>
					</a>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>

@include('admin/pintu-parkir/tambah')