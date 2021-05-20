<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

		$kueri = "SELECT * FROM pesan WHERE id_pesan = '$_GET[id]'";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql);

		$isi = nl2br(htmlentities($data['pesan'], ENT_QUOTES));

		$isi_tampil = html_entity_decode($isi);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div id = "pesan_balas">
		
		<h2>Data Pesan</h2>

		<form name="pesan" action="?tampil=pesan_balasproses" method="post">
			<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
			<table border="0" cellpadding="10">

				<tr>
					<td>Kepada</td>
					<td><input type="text" name="email" value="<?= $data['email']; ?>"></td>
				</tr>
				<tr>
					<td>Subjek</td>
					<td><input type="text" name="subjek" value="Re: <?= $data['subjek']; ?>"></td>
				</tr>
				<tr>
					<td valign="top">Pesan</td>
					<td width="20"><?= $isi_tampil; ?></td>
				</tr>
				<tr>
					<td valign="top">Balas</td>
					<td><textarea name="balasan" cols="80" rows="15"></textarea></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td><input type="submit" name="balas" value="Balas"></td>
				</tr>
				
			</table>

		</form>

	</div>

</body>
</html>

<?php
	}
?>