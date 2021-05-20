<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}

	else{

		$kueri = "SELECT * FROM menu WHERE id_menu = $_GET[id]";
		$sql = mysqli_query($koneksi, $kueri) or die($koneksi);
		$data = mysqli_fetch_array($sql);

?>

<div id = "blok_tambah">
	
	<h2 class="judul">Tambah Menu</h2>

	<form name="edit" action="?tampil=menu_editproses" method="post">
		<input type="hidden" name="id_menu" value="<?= $_GET['id']; ?>">

		<table border="0" cellpadding="10">
			<tr>
				<td>Judul menu</td>
				<td><input type="text" name="judul" value="<?= $data['judul']; ?>"></td>
			</tr>
			<tr>
				<td>Link</td>
				<td><input type="text" name="link" value="<?= $data['link']; ?>"></td>
			</tr>
			<tr>
				<td>Urutan</td>
				<td><input type="text" name="urutan" value="<?= $data['urutan']; ?>"></td>
			</tr>
			<tr></tr>
			<tr>
				<td></td>
				<td><input type="submit" name="edit" value="edit"></td>
			</tr>
		</table>
		
	</form>

</div>

<?php

	}

?>