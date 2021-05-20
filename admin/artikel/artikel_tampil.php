<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv = 'refresh' content = '0;
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

	<div id = "artikel">
		
		<h2 class="title">Data Artikel</h2>
		<a href="?tampil=artikel_tambah" class="link_tambah">Tambah Artikel</a>
		<br><br>

		<table border="0" cellpadding="5" width="100%" class="data">

			<tr>
				<th>No</th>
				<th>Judul Artikel</th>
				<th>Tanggal</th>
				<th>Aksi</th>
			</tr>

			<?php 
				include("../lib/fungsi_tgl_indonesia.php");
				$kueri = "SELECT * FROM artikel ORDER BY id_artikel ASC";
				$sql = mysqli_query($koneksi, $kueri) or die($koneksi);
				$jml_data = mysqli_num_rows($sql);

				if($jml_data < 1){
					echo "<tr><td colspan='4'>Tidak ada data yang dapat ditampilkan</td></tr>";
				}
				else{
					while($data = mysqli_fetch_array($sql)){
						$tgl = tgl_indonesia($data['tanggal']);

			?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $data['judul']; ?></td>
				<td><?= $tgl; ?></td>
				<td>
					<a href="?tampil=artikel_edit&id=<?= $data['id_artikel']; ?>" class="link_aksi">Edit</a> | 
					<a href="?tampil=artikel_hapus&id=<?= $data['id_artikel']; ?>" class="link_aksi">Hapus</a>
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