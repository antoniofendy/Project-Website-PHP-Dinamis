<?php
	
	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{
		$no = 1;
?>

<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/tampil_data.css">

</head>
<body>

	<h2 class="title">Data Submenu</h2>
	<a href="?tampil=submenu_tambah" class="link_tambah">Tambah Submenu</a>
	<br><br>
	<table border="0" cellpadding="5"  class="data" width="100%">

		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Induk</th>
			<th>Link</th>
			<th>Urutan</th>
			<th>Aksi</th>
		</tr>
		
		<?php

			$kueri = "SELECT * FROM submenu ORDER BY id_menu ASC";
			$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
			$jml_data = mysqli_num_rows($sql);

			if($jml_data < 1){
				echo "<tr><td colspan='6'>Tidak ada data yang dapat ditampilkan</td></tr>";
			}
			else{
				while($data = mysqli_fetch_array($sql)){
					$kueri_menu = "SELECT * FROM MENU WHERE id_menu='$data[id_menu]'";
					$sql_menu = mysqli_query($koneksi, $kueri_menu) or die(mysqli_error($koneksi));
					$data_menu = mysqli_fetch_array($sql_menu);
		?>
					<tr>
						<td><?= $no; ?></td>
						<td><?= $data['judul']; ?></td>
						<td><?= $data_menu['judul']; ?></td>
						<td><?= $data['link']; ?></td>
						<td><?= $data['urutan']; ?></td>
						<td>
							<a href="?tampil=submenu_edit&id=<?= $data['id_submenu']; ?>" class="link_aksi">Edit</a> | 
							<a href="?tampil=submenu_hapus&id=<?= $data['id_submenu'] ?>" class="link_aksi">Hapus</a>
						</td>
					</tr>
		<?php
			$no++;
				}
			}
		?>

	</table>

</body>
</html>

<?php
	
	}

?>