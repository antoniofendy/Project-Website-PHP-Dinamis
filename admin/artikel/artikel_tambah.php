<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv = 'refresh' content = '0;
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
		<h2>Tambah Artikel</h2>
		<form name="artikel_tambah" method="post" action="?tampil=artikel_tambahproses" enctype="multipart/form-data">
			<table border="0" cellpadding="10">

				<tr>
					<td>Judul artikel</td>
					<td><input type="text" name="judul" size="80"></td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td><input type="file" name="gambar" multiple="5"></td>
				</tr>
				<tr>
					<td valign="top">Isi artikel</td>
					<td><textarea name="isi" cols="80" rows="15"></textarea></td>
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