<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{
		$kueri = "SELECT * FROM halaman WHERE id_halaman = '$_GET[id]'";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		$data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2 class="judul">Edit Halaman</h2>
	<form name="edit" method="post" action="?tampil=halaman_editproses">
		<input type="hidden" name="id_halaman" value="<?= $_GET['id']; ?>">
		<table border="0" cellpadding="10">

			<tr>
				<td>Judul halaman</td>
				<td><input type="text" name="judul" size="80" value="<?= $data['judul']; ?>"></td>
			</tr>
			<tr>
				<td valign="top">Isi halaman</td>
				<td><textarea name="isi" cols="80" rows="15"><?= $data['isi']; ?></textarea></td>
			</tr>
			<tr></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="edit" value="Edit"></td>
			</tr>
			
		</table>
	</form>

</body>
</html>

<?php
	}
?>