<?php 
$conn = mysqli_connect("localhost", "root", "fais02082002", "perpustakaan");

function tampil($data){ //function untuk menampilkan data
	global $conn;
	$query = mysqli_query($conn, $data);
	$rows = [];
	while ($row = mysqli_fetch_assoc($query)) {
		$rows[] = $row;
	}
	return $rows;
}

function upload($table){ // diisi parameter dari table mana?? penjaga, peminjam, buku, admin
	$namaFile = $_FILES["gambar"]["name"];
	$ukuranFile = $_FILES["gambar"]["size"];
	$error = $_FILES["gambar"]["error"];
	$tmpName = $_FILES["gambar"]["tmp_name"];
	
	if ($error === 4) {
		echo "<sript>alert('Anda belum mengupload gambar')</sript>";
		return false;
	}

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>alert('Yang anda masukkan bukan gambar')</script>";
		return false;
	}
	if ($ukuranFile > 10000000) {
		echo "<script>alert('Ukuran gambar terlalu besar max 10mb')</script>";
		return false;
	}
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// Mengurus perpindahan files
	move_uploaded_file($tmpName, "../images/$table/" . $namaFileBaru);
	return $namaFileBaru;
}

function uploadUser($table){ // diisi parameter dari table mana?? penjaga, peminjam, buku, admin
	$namaFile = $_FILES["gambar"]["name"];
	$ukuranFile = $_FILES["gambar"]["size"];
	$error = $_FILES["gambar"]["error"];
	$tmpName = $_FILES["gambar"]["tmp_name"];
	
	if ($error === 4) {
		echo "<sript>alert('Anda belum mengupload gambar')</sript>";
		return false;
	}

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>alert('Yang anda masukkan bukan gambar')</script>";
		return false;
	}
	if ($ukuranFile > 10000000) {
		echo "<script>alert('Ukuran gambar terlalu besar max 10mb')</script>";
		return false;
	}
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// Mengurus perpindahan files
	move_uploaded_file($tmpName, "images/$table/" . $namaFileBaru);
	return $namaFileBaru;
}

function tambahBuku($data){ //parameter data berisi variabel $_POST //digunakan untuk menambahkan buku
	global $conn;
	// untuk memproses auto_increments bilangan 
	$noBesar = tampil("SELECT MAX(id_buku) FROM buku");
	$pecahId = substr($noBesar[0]["MAX(id_buku)"], 1,4); 
	$pecahId ++;
	$id_buku = "B" . sprintf("%04s",$pecahId);

	// SYNTAX UPLOAD gambar_buku
	$gambar_buku = upload("buku");
	if ( !$gambar_buku ) {
		return false;
	}

	//ambil data inputan POST
	$judul_buku = htmlspecialchars($data["judul_buku"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$id_genre = htmlspecialchars($data["id_genre"]);

	$query = "INSERT INTO buku VALUES ('$id_buku', '$judul_buku', '$penerbit', '$gambar_buku', '$id_genre')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
} 
function updateBuku($data) {
	global $conn;
	$id_buku = $_GET["id_buku"];
	$judul = htmlspecialchars($data["judul_buku"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$id_genre = htmlspecialchars($data["id_genre"]);

	$query = "UPDATE buku SET 	judul_buku = '$judul', 
								penerbit = '$penerbit',
							  	id_genre = '$id_genre' 
							  	WHERE id_buku = '$id_buku'";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function tambahPeminjam ($data){
	global $conn;
	// untuk memproses auto_increments bilangan 
	$noBesar = tampil("SELECT MAX(id_peminjam) FROM peminjam");
	$pecahId = substr($noBesar[0]["MAX(id_peminjam)"], 1,4); 
	$pecahId ++;
	$id_peminjam = "M" . sprintf("%04s",$pecahId);

	// SYNTAX UPLOAD gambar_peminjam
	$gambar_peminjam = upload("peminjam");
	if ( !$gambar_peminjam ) {
		return false;
	}

	// Mengolah variable $_POST
	$nama_peminjam = htmlspecialchars($data["nama_peminjam"]);
	$alamat_peminjam = htmlspecialchars($data["alamat_peminjam"]);
	$noTelp_peminjam = htmlspecialchars($data["noTelp_peminjam"]);
	$id_kelas = $data["id_kelas"];

	$query = "INSERT INTO peminjam VALUES
				('$id_peminjam', '$nama_peminjam', '$alamat_peminjam', '$noTelp_peminjam', '$id_kelas', '$gambar_peminjam')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function updatePeminjam($data) {
	global $conn;
	$id_peminjam = $_GET["id_peminjam"];
	$nama_peminjam = htmlspecialchars($data["nama_peminjam"]);
	$alamat_peminjam = htmlspecialchars($data["alamat_peminjam"]);
	$noTelp_peminjam = htmlspecialchars($data["noTelp_peminjam"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);

	$query = "UPDATE peminjam SET 	id_peminjam = '$id_peminjam',
									nama_peminjam = '$nama_peminjam',
									alamat_peminjam = '$alamat_peminjam',
									noTelp_peminjam = '$noTelp_peminjam',
									id_kelas = '$id_kelas'";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function tambahPenjaga($data){
	global $conn;
	// untuk memproses auto_increments bilangan 
	$noBesar = tampil("SELECT MAX(id_penjaga) FROM penjaga");
	$pecahId = substr($noBesar[0]["MAX(id_penjaga)"], 1,4); 
	$pecahId ++;
	$id_penjaga = "P" . sprintf("%04s",$pecahId);

	// SYNTAX UPLOAD gambar_peminjam
	$gambar_penjaga = upload("penjaga");
	if ( !$gambar_penjaga ) {
		return false;
	}

	// Memproses Variable $_POST
	$nama_penjaga = htmlspecialchars($data["nama_penjaga"]);
	$alamat_penjaga = htmlspecialchars($data["alamat_penjaga"]);
	$noTelp_penjaga = htmlspecialchars($data["noTelp_penjaga"]);

	$query = "INSERT INTO penjaga 
				VALUES ('$id_penjaga', '$nama_penjaga', '$alamat_penjaga', '$noTelp_penjaga', '$gambar_penjaga')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function updatePenjaga ($data) {
	global $conn;
	$id_penjaga = $_GET["id_penjaga"];
	$nama_penjaga = htmlspecialchars($data["nama_penjaga"]);
	$alamat_penjaga = htmlspecialchars($data["alamat_penjaga"]);
	$noTelp_penjaga = htmlspecialchars($data["noTelp_penjaga"]);

	$query = "UPDATE penjaga SET 	id_penjaga = '$id_penjaga',
									nama_penjaga = '$nama_penjaga',
									alamat_penjaga = '$alamat_penjaga',
									noTelp_penjaga = '$noTelp_penjaga'";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($table, $field, $id, $folder){
	global $conn;
	$query = "DELETE FROM $table WHERE $field = '$id'";
	$hapusGambarDir = tampil("SELECT * FROM $table WHERE $field = '$id'")[0];
	// membuat plugin entah di kemudian hari ada error bagian file yang tak terhapus
	// $semuaGambar = tampil("SELECT * FROM buku");
	// $items = array();
	// foreach($semuaGambar as $gambar) {
 // 		$items[] = $gambar["gambar_buku"];
	// }
	// if (!in_array(needle, haystack)) {
	// 	# code...
	// }
	if (file_exists("../images/$table/".$hapusGambarDir["$folder"]) === true) {
		unlink("../images/$table/". $hapusGambarDir["$folder"]);
	}
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	// cek username
	$result = mysqli_query($conn, "SELECT nama_user FROM admin WHERE nama_user = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "	<script>
					alert('Username Sudah Ada, Silahkan Coba lagi!')
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "	<script>
					alert('Konfirmasi password anda tidak sama')
				</script>";
		return false;
	}

	$gambar_admin = uploadUser("admin");
	if ( !$gambar_admin ) {
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	// $password = md5($password);

	// tambahkan user baru
	$query = "INSERT INTO admin VALUES('', '$username', '$password', '$gambar_admin')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
date_default_timezone_set('Asia/Jakarta');
?>