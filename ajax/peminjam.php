<?php
session_start();
require '../conn.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM peminjam INNER JOIN kelas ON peminjam.id_kelas = kelas.id_kelas
				WHERE
				nama_peminjam LIKE '%$keyword%' OR
				nama_kelas LIKE '%$keyword%' OR
				alamat_peminjam LIKE '%$keyword%'
			";
$row2 = tampil($query);
?>
<div class="table-responsive table--no-card m-b-40">
	<table class="table table-borderless table-striped table-earning">
		<thead>
			<tr>
				<th class="text-center">NO</th>
				<th colspan="2" class="text-center">OPSI</th>
				<th class="text-center">FOTO PEMINJAM</th>
				<th class="text-center">NAMA PEMINJAM</th>
				<th class="text-center">ALAMAT</th>
				<th class="text-center">NO TELPON</th>
				<th class="text-center">KELAS</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;?>
			<?php foreach ($row2 as $Peminjam) :?>
			<tr>
				<td class="text-center"><?= $no ?></td>
				<td class="text-center">
					<a href="update/updatePeminjam.php?id_peminjam=<?= $Peminjam['id_peminjam']; ?>">
						<button class='au-btn au-btn-icon au-btn--blue au-btn--small'><i class='zmdi zmdi-border-color'></i>Edit</button>
					</a>
				</td>
				<td class="text-center">
					<a href="delete/deletePeminjam.php?id_peminjam=<?= $Peminjam['id_peminjam'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ?')">
						<button class='btn btn-danger'><i class='zmdi zmdi-block-alt'></i> Hapus</button>
					</a>
				</td>
				<td class="text-center">
					<img src="images/peminjam/<?= $Peminjam['gambar_peminjam'];?>" data-toggle="modal" data-target="#exampleModal" style="width: 100px;">
				</td>
				<td class="text-center"><?= $Peminjam['nama_peminjam'];?></td>
				<td class="text-center"><?= $Peminjam['alamat_peminjam'];?></td>
				<td class="text-center"><?= $Peminjam['noTelp_peminjam'];?></td>
				<td class="text-center"><?= $Peminjam['nama_kelas'];?></td>
			</tr>
			<?php $no++; ?>
			<?php endforeach ?>
		</tbody>
	</table>
</div>