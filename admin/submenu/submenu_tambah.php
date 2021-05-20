<?php
	
	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{
		
?>

<h2>Tambah Submenu</h2>
<form name="tambah" method="post" action="?tampil=submenu_tambahproses">

	<table border="0" cellpadding="10">

		<tr>
			<td>Judul menu</td>
			<td><input type="text" name="judul"></td>
		</tr>
		<tr>
			<td>Menu induk</td>
			<td>
				<select name="induk">
					<?php
						$kueri = "SELECT * FROM menu ORDER BY id_menu ASC";
						$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
						while($data = mysqli_fetch_array($sql)){
							echo "<option value='$data[id_menu]'>$data[judul]</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Link</td>
			<td><input type="text" name="link"></td>
		</tr>
		<tr>
			<td>Urutan</td>
			<td><input type="number" name="urutan" min="1"></td>
		</tr>
		<tr></tr>
		<tr>
			<td></td>
			<td><input type="submit" name="tambah" value="Tambah"></td>
		</tr>
		
	</table>
	
</form>

<?php
	}
?>