<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv = 'refresh' content = '0;
				url=../index.php'>";
	}

	else{
		$kueri = "SELECT * FROM artikel WHERE id_artikel = '$_GET[id]'";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<style type="text/css">
		
		.gbr{
			width: 100px;
			height: 100px;
			border: 1px solid #ccc;
			padding: 3px;
		}

	</style>

</head>
<body>

	<div id="edit">
		
		<form name="edit_artikel" method="post" action="?tampil=artikel_editproses" enctype="multipart/form-data">
			<input type="hidden" name="id_artikel" value="<?= $_GET['id']; ?>">
			<table border="0" cellpadding="10">
				<tr>
					<td>Judul artikel</td>
					<td colspan="2"><input type="text" name="judul" value="<?= $data['judul']; ?>"></td>
				</tr>
				<tr>
					<td valign="top">Gambar</td>
					<td width="110"><img src="../image/artikel/<?= $data['gambar']; ?>" alt="gambar artikel" class="gbr"></td>
					<td valign="bottom"><input type="file" name="gambar"></td>
				</tr>
				<tr>
					<td valign="top">Isi</td>
					<td colspan="2"><textarea name="isi" cols="80" rows="15"><?= $data['isi']; ?></textarea></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td colspan="2"><input type="submit" name="tb_edit" value="Edit"></td>
				</tr>
			</table>
		</form>

	</div>

</body>
</html>

<?php
	}
?>