<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

		$kueri = "SELECT * FROM submenu WHERE id_submenu = $_GET[id]";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql);
?>

		<h2>Edit Submenu</h2>
		<form name="edit" method="post" action="?tampil=submenu_editproses">
			
				<input type="hidden" name="id_submenu" value="<?= $_GET['id']; ?>">

				<table border="0" cellpadding="10">
					
					<tr>
						<td>Judul menu</td>
						<td><input type="text" name="judul" value="<?= $data['judul']; ?>"></td>
					</tr>
					<tr>
						<td>Menu induk</td>
						<td>
							<select name="induk">
								<?php

									$kueri_data = "SELECT * FROM menu";
									$sql_menu = mysqli_query($koneksi, $kueri_data) or die(mysqli_error($koneksi));

									while($data_menu = mysqli_fetch_array($sql_menu)){
										if($data_menu['id_menu'] == $data['id_menu']){
											echo "<option value='$data_menu[id_menu]' selected>$data_menu[judul]</option>";
										}
										else{
											echo "<option value='$data_menu[id_menu]'>$data_menu[judul]</option>";
										}
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Link</td>
						<td><input type="text" name="link" value="<?= $data['link']; ?>"></td>
					</tr>
					<tr>
						<td>Urutan</td>
						<td><input type="number" name="urutan" min="1" value="<?= $data['urutan']; ?>"></td></td>
					</tr>
					<tr></tr>
					<tr>
						<td></td>
						<td><input type="submit" name="edit" value="Edit"></td>
					</tr>

				</table>

		</form>

<?php

	}

?>