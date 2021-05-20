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

	<div id = "galeri">

		<h2 class="title">Data Galeri</h2>
		<a href="?tampil=galeri_tambah" class="link_tambah">Tambah Galeri</a>
		<br><br>
		<table class="data" border="0" cellpadding="5" width="100%">
			<tr>
				<th>No</th>
				<th>Foto</th>
				<th>Judul Foto</th>
				<th>Tanggal</th>
				<th>Aksi</th>
			</tr>
			<?php

				include("../lib/fungsi_tgl_indonesia.php");

				$kueri = "SELECT * FROM galeri ORDER BY id_galeri ASC";
				$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
				$jml_data = mysqli_num_rows($sql);

				if($jml_data < 1){
					echo "<tr><td colspan='5'>Tidak ada data yang dapat ditampilkan</td></tr>";
				}
				else{
					while($data = mysqli_fetch_array($sql)){
						$tgl = tgl_indonesia($data['tanggal']);
			?>
			<tr>
				<td><?= $no; ?></td>
				<td><img src="../image/galeri/<?= $data['gambar']; ?>" class="gbr"></td>
				<td><?= $data['judul']; ?></td>
				<td><?= $tgl; ?></td>
				<td>
					<a href="?tampil=galeri_edit&id=<?= $data['id_galeri']; ?>" class="link_aksi">Edit</a> | 
					<a href="?tampil=galeri_hapus&id=<?= $data['id_galeri']; ?>" class="link_aksi">Hapus</a>
				</td>
			</tr>
			<?php
				$no++;
					}
				}
			?>
		</table>

	</div>

</body>
</html>

<?php
	}
?>
