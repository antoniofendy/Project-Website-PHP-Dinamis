<?php
	
	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

?>

<div id = "blok_tambah">
	
	<h2 class="judul">Tambah Menu</h2>

	<form name="tambah" action="?tampil=menu_tambahproses" method="post">

		<table border="0" cellpadding="10">
			<tr>
				<td>Judul menu</td>
				<td><input type="text" name="judul"></td>
			</tr>
			<tr>
				<td>Link</td>
				<td><input type="text" name="link"></td>
			</tr>
			<tr>
				<td>Urutan</td>
				<td><input type="text" name="urutan"></td>
			</tr>
			<tr></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
		
	</form>

</div>

<?php
	}
?>