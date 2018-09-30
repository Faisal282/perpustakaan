<?php
session_start();
require 'conn.php';
if (!isset($_SESSION["login"])) {
echo "<script>alert('Hayyoo belum login yaa...')
document.location.href = 'login.php'
</script>";
// header("Location: login.php");
exit();
}
$id_admin = $_SESSION['id_admin'];
$dataBuku = tampil("SELECT * FROM buku INNER JOIN genre ON buku.id_genre = genre.id_genre ORDER BY id_buku ASC");
$dataAdmin = tampil("SELECT * FROM admin WHERE id_admin = '$id_admin'");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Jquery JS-->
		<script src="vendor/jquery-3.2.1.min.js"></script>
		<script src="js/scriptBuku.js"></script>
		<!-- Required meta tags-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="au theme template">
		<meta name="author" content="Hau Nguyen">
		<meta name="keywords" content="au theme template">
		<!-- Title Page-->
		<title>Halaman Admin</title>
		<!-- Fontfaces CSS-->
		<link href="css/font-face.css" rel="stylesheet" media="all">
		<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
		<link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
		<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
		<!-- Bootstrap CSS-->
		<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
		<!-- Vendor CSS-->
		<link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
		<link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
		<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
		<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
		<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
		<!-- Main CSS-->
		<link href="css/theme.css" rel="stylesheet" media="all">
		<!-- CSS SHAKE -->
		<link rel="stylesheet" type="text/css" href="css/csshake.min.css">
		<style>
		.loader{
		width: 45px;
		height: 45px;
		position: absolute;
		left: 400px;
		z-index: -1;
		display: none;
		}
		</style>
	</head>
	<body>
		<div class="page-wrapper">
			<!-- HEADER MOBILE-->
			<header class="header-mobile d-block d-lg-none">
				<div class="header-mobile__bar">
					<div class="container-fluid">
						<div class="header-mobile-inner">
							<a class="logo" href="../index.php">
								<img src="images/icon/ts.png" alt="CoolAdmin" class="shake-slow shake-hover" style="height: 50px">
							</a>
							<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
							</button>
						</div>
					</div>
				</div>
				<nav class="navbar-mobile">
					<div class="container-fluid">
						<ul class="navbar-mobile__list list-unstyled">
							<li>
								<a href="index.php">
									<i class="fas fa-book"></i>Daftar Buku
								</a>
							</li>
							<li class="">
								<a href="peminjam.php">
									<i class="fas fa-male"></i>Peminjam
								</a>
							</li>
							<li>
								<a href="penjaga.php">
									<i class="fas fa-users"></i>Penjaga
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- END HEADER MOBILE-->
			<!-- MENU SIDEBAR-->
			<aside class="menu-sidebar d-none d-lg-block">
				<div class="logo">
					<a href="../index.php">
						<div class="shake-slow">
							<img src="images/icon/ts.png" alt="Cool Admin" style="height: 70px">
						</div>
					</a>
				</div>
				<div class="menu-sidebar__content js-scrollbar1">
					<nav class="navbar-sidebar">
						<ul class="list-unstyled navbar__list">
							<li class="active">
								<a class="js-arrow" href="index.php">
									<i class="fas fa-book"></i>Daftar Buku
								</a>
							</li>
							<li class="">
								<a href="peminjam.php">
									<i class="fas fa-male"></i>Peminjam
								</a>
							</li>
							<li>
								<a href="penjaga.php">
									<i class="fas fa-users"></i>Penjaga
								</a>
							</li>
							<li>
								<a href="PINJAM/index.php">
									<i class="fas fa-users"></i>Data Pinjaman
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</aside>
			<!-- END MENU SIDEBAR-->
			<!-- PAGE CONTAINER-->
			<div class="page-container">
				<!-- HEADER DESKTOP-->
				<header class="header-desktop">
					<div class="section__content section__content--p30">
						<div class="container-fluid">
							<div class="header-wrap">
								<form class="form-header" action="" method="POST">
									<input class="au-input au-input--xl" type="text" name="keyword" placeholder="Cari Data &amp; Laporan..." autofocus autocomplete="off" id="keyword">
									<button class="au-btn--submit" type="submit" name="cari" id="tombol-cari">
									<i class="zmdi zmdi-search"></i>
									</button>
									<img src="images/loader.gif" class="loader">
								</form>
								<div class="header-button">
									<div class="noti-wrap"></div>
									<div class="account-wrap">
										<div class="account-item clearfix js-item-menu">
											<div class="image">
												<?php foreach($dataAdmin as $admin):?>
												<img src="images/admin/<?=$admin['gambar_admin']?>">
											</div>
											<div class="content">
												<a class="js-acc-btn" href="#"><?=$admin['nama_user']?></a>
												<?php endforeach?>
												<div class="account-dropdown js-dropdown">
													<div class="account-dropdown__footer">
														<a href="logout.php">
														<i class="zmdi zmdi-power"></i>Logout</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</header>
					<!-- HEADER DESKTOP-->
					<!-- MAIN CONTENT-->
					<section class="popup">
						<div class="container kotak">
						</div>
					</section>
					<div class="main-content">
						<div class="section__content section__content--p30">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-12">
										<div class="row m-b-25">
											<div class="col-sm-4">
												<h2 class="title-1 m-b-25">Daftar Buku</h2>
											</div>
											<div class="col-sm-4 offset-sm-4">
												<div class="table-data__tool-right text-right">
													<a href="tambah/tambahBuku.php">
														<button class="au-btn au-btn-icon au-btn--green au-btn--small">
														<i class="zmdi zmdi-plus"></i>Tambah Buku
														</button>
													</a>
												</div>
											</div>
										</div>
										<!-- AJAX -->
										<div id="container">
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
														<?php foreach ($dataBuku as $buku) :?>
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
														<!-- Modal -->
													</tbody>
												</table>
											</div>
										</div>
										<!--  -->
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="copyright">
												<p>Copyright &copy; 2018 Wadahsukses. All rights reserved. Created By
													<a href="https://wadahsukses.com">Wadahsukses</a>.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END MAIN CONTENT-->
							<!-- END PAGE CONTAINER-->
						</div>
					</div>
					<!-- Jquery JS-->
					<script src="vendor/jquery-3.2.1.min.js"></script>
					<!-- Bootstrap JS-->
					<script src="vendor/bootstrap-4.1/popper.min.js"></script>
					<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
					<!-- Vendor JS       -->
					<script src="vendor/slick/slick.min.js">
					</script>
					<script src="vendor/wow/wow.min.js"></script>
					<script src="vendor/animsition/animsition.min.js"></script>
					<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
					</script>
					<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
					<script src="vendor/counter-up/jquery.counterup.min.js">
					</script>
					<script src="vendor/circle-progress/circle-progress.min.js"></script>
					<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
					<script src="vendor/chartjs/Chart.bundle.min.js"></script>
					<script src="vendor/select2/select2.min.js">
					</script>
					<!-- Main JS-->
					<script src="js/main.js"></script>
				</body>
			</html>