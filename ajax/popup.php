<?php
	require '../conn.php';
	if (isset($_POST['id_gambar'])) {
		$id_peminjam = $_POST["id_gambar"]; // ini berfungsi mendapatkan id_peminjam
		$query = tampil("SELECT * FROM data_pinjaman 
			INNER JOIN buku ON data_pinjaman.id_buku = buku.id_buku  
			INNER JOIN peminjam ON data_pinjaman.id_peminjam = peminjam.id_peminjam 
			INNER JOIN penjaga ON data_pinjaman.id_penjaga = penjaga.id_penjaga
			WHERE data_pinjaman.id_peminjam = '$id_peminjam'");
	}
?>
<div class="table-responsive table--no-card m-b-40">
	<table class="table table-borderless table-striped table-earning">
		<thead>
			<tr>
				<th class="text-center">NO</th>
				<th class="text-center">JUDUL BUKU</th>
				<th class="text-center">NAMA PENJAGA</th>
				<th class="text-center">TANGGAL PINJAM</th>
				<th class="text-center">TANGGAL KEMBALI</th>
				<th colspan="2" class="text-center">OPSI</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;?>
			<?php foreach ($query as $Peminjam) :?>
			<tr>
				<td class="text-center"><?= $no ?></td>
				<td class="text-center"><?= $Peminjam['judul_buku'];?></td>
				<td class="text-center"><?= $Peminjam['nama_penjaga'];?></td>
				<td class="text-center"><?= $Peminjam['tgl_pinjam'];?></td>
				<td class="text-center"><?= $Peminjam['tgl_kembali'];?></td>
				<td class="text-center">
					<a href="update/updatePeminjam.php?id_peminjam=<?= $Peminjam['id_peminjam']; ?>">
						<button class='au-btn au-btn-icon au-btn--blue au-btn--small'><i class='zmdi zmdi-border-color'></i>PERPANJANG</button>
					</a>
				</td>
				<td class="text-center">
					<a href="delete/deletePeminjam.php?id_peminjam=<?= $Peminjam['id_peminjam'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ?')">
						<button class='btn btn-danger'><i class='zmdi zmdi-block-alt'></i>AKHIRI</button>
					</a>
				</td>
			</tr>
			<?php $no++; ?>
			<?php endforeach ?>
		</tbody>
	</table>
</div>