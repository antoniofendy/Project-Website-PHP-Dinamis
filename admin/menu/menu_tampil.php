<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

		$no=1;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/tampil_data.css">
</head>
<body>

	<div id="blok_menu">
	
	<h2 class="title">Data Menu</h2>
	<a href="?tampil=menu_tambah" class="link_tambah">Tambah Menu</a>
	<br>
	<br>

	<table class="data" border="0" width="100%" cellpadding="5">

		<tr>
			<th width="5%" class="header">No</th>
			<th width="47%" class="header">Judul Menu</th>
			<th width="20%" class="header">Link</th>
			<th width="8%" class="header">Urutan</th>
			<th width="20%" class="header">Aksi</th>
		</tr>

		<tr>
			
			<?php
				$kueri = "SELECT * from menu ORDER BY urutan ASC";
				$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
				$jml_data = mysqli_num_rows($sql);

				if($jml_data < 1){
					echo "<td colspan='5'>Tidak ada data yang dapat ditampilkan</td>";
				}
				else{
					while($data = mysqli_fetch_array($sql)){
			?>
			<td><?= $no; ?></td>
			<td><?= $data['judul']; ?></td>
			<td><?= $data['link']; ?></td>
			<td><?= $data['urutan']; ?></td>
			<td>
				<a href="?tampil=menu_edit&id=<?= $data['id_menu']; ?>" class="link_aksi">Edit</a> | 
				<a href="?tampil=menu_hapus&id=<?= $data['id_menu']; ?>" class="link_aksi">Hapus</a>
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

