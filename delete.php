<?php 

session_start();

// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit;
// }


require 'conn.php';

$id = $_GET['id'];

if ( hapus("buku", "id_buku", $id) > 0 ) {
	echo '<script>alert("Data Berhasil Dihapus")
            document.location.href = "../index.php"
            </script>';
}else {
	echo '<script>alert("Data Gagal Dihapus")
            document.location.href = "../index.php"
            </script>';
}

?>