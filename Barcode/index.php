<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Barcode</title>
	</head>
	<body>
		<h1>INPUT FORM BARCODE</h1>
		<form action="result.php" method="POST" name="barcode-form">
			<table>
				<tr>
					<td width="200">PART NO</td>
					<td width="300">:
						<input type="text" id="text" name="partno">
					</td>
				</tr>
				<tr>
					<td>QTY</td>
					<td>:
						<input type="text" id="text" name="qty">
					</td>
				</tr>
				<tr>
					<td>DESCRIPTION</td>
					<td>:
						<input type="text" id="text" name="desc">
					</td>
				</tr>
				<tr>
					<td>TURN AROUND</td>
					<td>:
						<input type="text" id="text" name="turn">
					</td>
				</tr>
				<tr>
					<td>PO</td>
					<td>:
						<input type="text" id="text" name="po">
					</td>
				</tr>
				<tr>
					<td>SERIAL</td>
					<td>:
						<input type="text" id="text" name="serial">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>&nbsp;&nbsp;<input type="submit" name="barcode-button"></td>
				</tr>
			</table>
		</form>
	</body>
</html>