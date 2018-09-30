<?php
session_start();
require '../conn.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM penjaga
				WHERE
				nama_penjaga LIKE '%$keyword%' OR
				alamat_penjaga LIKE '%$keyword%'
			";
$row2 = tampil($query);
?>
<div class="table-responsive table--no-card m-b-40">
	<table class="table table-borderless table-striped table-earning">
		<thead>
			<tr>
				<th class="text-center">NO</th>
				<th colspan="2" class="text-center">OPSI</th>
				<th class="text-center">FOTO PENJAGA</th>
				<th class="text-center">NAMA PENJAGA</th>
				<th class="text-center">ALAMAT</th>
				<th class="text-center">NO TELPON</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;?>
			<?php foreach ($row2 as $Penjaga) :?>
			<tr>
				<td class="text-center"><?= $no ?></td>
				<td class="text-center">
					<a href="update/updatePenjaga.php?id_penjaga=<?= $Penjaga['id_penjaga']; ?>">
						<button class='au-btn au-btn-icon au-btn--blue au-btn--small'><i class='zmdi zmdi-border-color'></i>Edit</button>
					</a>
				</td>
				<td class="text-center">
					<a href="delete/deletePenjaga.php?id_penjaga=<?= $Penjaga['id_penjaga'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ?')">
						<button class='btn btn-danger'><i class='zmdi zmdi-block-alt'></i> Hapus</button>
					</a>
				</td>
				<td class="text-center">
					<img src="images/penjaga/<?= $Penjaga['gambar_penjaga'];?>" style="width: 125px;">
				</td>
				<td class="text-center"><?= $Penjaga['nama_penjaga'];?></td>
				<td class="text-center"><?= $Penjaga['alamat_penjaga'];?></td>
				<td class="text-center"><?= $Penjaga['noTelp_penjaga'];?></td>
			</tr>
			<?php $no++; ?>
			<?php endforeach ?>
		</tbody>
	</table>
</div>