<?php 
require 'conn.php';

//mengambil no terbesar 
	$noBesar = tampil("SELECT MAX(id_buku) FROM buku");
	$pecahId = substr($noBesar[0]["MAX(id_buku)"], 1,4);
	var_dump($noBesar);
	var_dump($pecahId);
	for ($i=0; $i <= 1000; $i++) { 
		$pecahId =+ $i;
	}
	$id_baru = "B".sprintf("%04s",$pecahId);
	var_dump($id_baru);
?>