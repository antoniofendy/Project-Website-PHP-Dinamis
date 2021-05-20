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

	<div id = "halaman">
		
		<h2 class="title">Data Halaman</h2>
		<a href="?tampil=halaman_tambah" class="link_tambah">Tambah Halaman</a>
		<br><br>

		<table class="data" border="0" cellpadding="5" width="100%">

			<tr>
				<th width="5%">No</th>
				<th width="30%">Judul Halaman</th>
				<th width="40%">Link Halaman</th>
				<th width="20%">Aksi</th>
			</tr>
				
				<?php 
					$kueri = "SELECT * FROM halaman ORDER BY id_halaman ASC";
					$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
					$jml_data = mysqli_num_rows($sql);

					if($jml_data < 1){
						echo "<tr><td colspan='4'>Tidak ada data yang dapat ditampilkan</td></td>";
					}
					else{
						while($data = mysqli_fetch_array($sql)){
				?>
				<tr>
				<td><?= $no; ?></td>
				<td><?= $data['judul']; ?></td>
				<td><?= "?tampil=halaman&id=$data[id_halaman]"; ?></td>
				<td>
					<a href="?tampil=halaman_edit&id=<?= $data['id_halaman']; ?>" class="link_aksi">Edit</a> | 
					<a href="?tampil=halaman_hapus&id=<?= $data['id_halaman']; ?>" class="link_aksi">Hapus</a>
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