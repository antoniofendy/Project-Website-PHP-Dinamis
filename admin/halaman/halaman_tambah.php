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

	<h2 class="judul">Tambah Halaman</h2>
	<form name="tambah" method="post" action="?tampil=halaman_tambahproses">
		<table border="0" cellpadding="10">

			<tr>
				<td>Judul halaman</td>
				<td><input type="text" name="judul" size="80"></td>
			</tr>
			<tr>
				<td valign="top">Isi halaman</td>
				<td><textarea name="isi" cols="80" rows="15"></textarea></td>
			</tr>
			<tr></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
			
		</table>
	</form>

</body>
</html>

<?php
	
	}
	
?>