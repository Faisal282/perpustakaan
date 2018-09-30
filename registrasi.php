<?php  

session_start();


require 'conn.php';

if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		echo "	<script>
					alert('User berhasil ditambahkan')
					document.location.href='login.php'
				</script>";
	} else{
		echo "	<script>
					alert('User gagal ditambahkan')
					document.location.href='login.php'
				</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

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
    <link rel="stylesheet" type="text/css" href="http://csshake.surge.sh/csshake-slow.min.css">

	<style>
		label{
			display: block;
		}
		.containers{
			margin-top: -5px;
		}
	</style>
</head>
<body>
	<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                            	<div class="shake-slow shake-hover">
                            		<img src="images/icon/logo.png" alt="CoolAdmin">
                            	</div>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input class="au-input au-input--full" type="password" name="password2" id="password2" placeholder="Confirm Password">
                                </div>
			                    <div class="row form-group">
			                        <div class="col col-md-3">
			                            <label for="file-input" class=" form-control-label">Gambar</label>
			                        </div>
			                        <div class="col-12 col-md-9">
			                             <input type="file" id="file-input" name="gambar" class="form-control-file">    
									</div>
			                    </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="register">register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Do you have account?
                                    <a href="login.php">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
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