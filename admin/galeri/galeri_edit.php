<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{
		$kueri = "SELECT * FROM galeri WHERE id_galeri = '$_GET[id]' ";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		
		.gbr{
			width: 200px;
			height: 150px;
			padding: 3px;
			border: 1px solid #ccc;
		}

	</style>

</head>
<body>

	<div id = "edit">
		
		<form name = "edit_galeri" method="post" action="?tampil=galeri_editproses" enctype="multipart/form-data">

			<input type="hidden" name="id_galeri" value="<?= $_GET['id']; ?>">
			
			<table border="0" cellpadding="10">

				<tr>
					<td>Judul galeri</td>
					<td colspan="2"><input type="text" name="judul" size="50" value="<?= $data['judul']; ?>"></td>
				</tr>
				<tr>
					<td valign="top">Gambar</td>
					<td><img src="../image/galeri/<?= $data['gambar']; ?>" class = "gbr"></td>
					<td valign="bottom"><input type="file" name="gambar"></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td colspan="2"><input type="submit" name="edit" value="Edit"></td>
				</tr>
				
			</table>

		</form>

	</div>

</body>
</html>

<?php
	
	}

?>