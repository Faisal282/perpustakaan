<?php
//dengan print text
//echo "barcode.php?text=$_GET[text]&print=true";
//Tanpa Print text
//echo "barcode.php?text=$_GET[text]";
	$partno	   = $_POST['partno'];
	$qty	   = $_POST['qty'];
	$desc	   = $_POST['desc'];
	$turn	   = $_POST['turn'];
	$po	   	   = $_POST['po'];
	$serial	   = $_POST['serial'];
?>
<html>
	<head>
		<meta name="author" title="Hakko Bio Richard | www.hakkoblogs.com" />
		<meta name="description" title="Barcode Generator"/>
		<title>Testing Barcode</title>
	</head>
	<body>
		<table border="1">
			<tr>
				<td colspan="2" width="300">Part No <b><?php echo $partno; ?></b> <br />
					(P) <img alt="<? $_GET['partno'];?>" src="<?php echo "barcode.php?size=30&text=$partno"; ?>" />
				</td>
				<td width="200"><center><h2>MASTER</h2></center></td>
			</tr>
			<tr>
				<td width="200">Quantity <b><?php echo $qty; ?></b><br />
				(Q) <img alt="<? $_GET['qty'];?>" src="<?php echo "barcode.php?size=30&text=$qty"; ?>" /></td>
				<td width="100"><center><b>CUSTOMER <br /> Facility</b></center></td>
				<td width="200">PART NO. <br /> <?php echo $partno; ?> <br /> DESCRIPTION <br /> <?php echo $desc ?></td>
			</tr>
			<tr>
				<td width="200">TURN AROUND # <b><?php echo $turn; ?></b><br />
				(7) <img alt="<? $_GET['turn'];?>" src="<?php echo "barcode.php?size=30&text=$turn"; ?>" /></td>
				<td colspan="2" width="300">PO # <b><?php echo $po; ?></b><br />
				(K) <img alt="<? $_GET['po'];?>" src="<?php echo "barcode.php?size=30&text=$po"; ?>" /></td>
			</tr>
			<tr>
				<td colspan="2" width="270">SERIAL (4S) <b><?php echo $serial; ?></b><br />
					(7) <img alt="<? $_GET['serial'];?>" src="<?php echo "barcode.php?size=30&text=$serial"; ?>" />
					<br /> HAKKO BIO RICHARD &copy; 2017 </td>
					<td><center>PRINT DATE</center> <br />
					<center><b><?php echo date('d/m/Y'); ?></b></center></td>
				</tr>
			</table><br />
			<a href="#" onclick="window.print()"> PRINT </a><br /><br />
			<a href="index.php"> BACK </a>
		</body>
	</html>