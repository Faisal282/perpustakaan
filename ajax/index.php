<?php
require '../conn.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM buku INNER JOIN genre ON buku.id_genre = genre.id_genre
				WHERE
				judul_buku LIKE '%$keyword%' OR
				penerbit LIKE '%$keyword%' OR
				genre LIKE '%$keyword%'
			";
$row2 = tampil($query);
?>
<div class="table-responsive table--no-card m-b-40">
	<table class="table table-borderless table-striped table-earning">
		<thead>
			<tr>
				<th class="text-center">NO</th>
				<th colspan="2" class="text-center">OPSI</th>
				<th class="text-center">GAMBAR</th>
				<th class="text-center">JUDUL BUKU</th>
				<th class="text-center">PENERBIT</th>
				<th class="text-center">GENRE</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;?>
			<?php foreach ($row2 as $buku) :?>
			<tr>
				<td class="text-center"><?= $no ?></td>
				<td class="text-center">
					<a href="update/updateBuku.php?id_buku=<?= $buku['id_buku']; ?>">
						<button class='au-btn au-btn-icon au-btn--blue au-btn--small'><i class='zmdi zmdi-border-color'></i>Edit</button>
					</a>
				</td>
				<td class="text-center">
					<a href="delete/deleteBuku.php?id_buku=<?= $buku['id_buku'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ?')">
						<button class='btn btn-danger'><i class='zmdi zmdi-block-alt'></i> Hapus</button>
					</a>
				</td>
				<td class="text-center">
					<img src="images/buku/<?= $buku['gambar_buku'];?>" style="width: 100px;">
				</td>
				<td class="text-center"><?= $buku['judul_buku'];?></td>
				<td class="text-center"><?= $buku['penerbit'];?></td>
				<td class="text-center"><?= $buku['genre'];?></td>
			</tr>
			<?php $no++; ?>
			<?php endforeach ?>
		</tbody>
	</table>
</div>