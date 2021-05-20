<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div id = "tambah">
		
		<h2>Tambah Galeri</h2>

		<form name="tambah_galeri" method="post" action="?tampil=galeri_tambahproses" enctype="multipart/form-data">
			<input type="hidden" name="id_galeri" value="<?= $_GET['id']; ?>">
			<table border="0" cellpadding="10">
				<tr>
					<td>Judul galeri</td>
					<td><input type="text" name="judul" size="50"></td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td><input type="file" name="gambar"></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td><input type="submit" name="tambah" value="Tambah"></td>
				</tr>
			</table>

		</form>

	</div>

</body>
</html>

<?php
	}
?>