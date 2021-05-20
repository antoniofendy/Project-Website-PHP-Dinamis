<?php
	
	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='1
				url=../index.php";
	}
	else{

?>


<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<style type="text/css">

		td{
			font-family: Open Sans;
		}

		.error{
			color: red;
			font-size: 12px;
			font-style: italic;
		}

		#pesan-error{
			vertical-align: top;
		}


	</style>

</head>
<body>

	<div id="cs_kontak">

		<h2>Kontak Pesan</h2>
		
		<form id="fm_kontak">
			
			<table border="0" cellpadding="10">
				
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama" size="50" placeholder="Nama anda" class="c_nama"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" size="50" placeholder="Email anda" class="c_email"></td>
				</tr>
				<tr>
					<td>Subjek</td>
					<td><input type="text" name="subjek" size="50" placeholder="Subjek pesan" class="c_subjek"></td>
				</tr>
				<tr>
					<td valign="top">Pesan</td>
					<td><textarea name="pesan" cols="50" rows="8" placeholder="Pesan anda" class="c_pesan"></textarea></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td><input type="submit" name="kirim" value="Kirim"></td>
				</tr>

			</table>

		</form>

	</div>

	<script src="../guest/plugin/jquery-validation/dist/jquery.validate.js"></script>
	<script src="../guest/konten/validation/kontak.js"></script>

</body>
</html>

<?php
	}
?>