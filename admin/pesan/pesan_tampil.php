<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

		$no = 1;

		include("../lib/fungsi_tgl_indonesia.php");

?>

<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/tampil_data.css">

</head>
<body>

	<div id="pesan">

		<h2 class="title">Data Pesan</h2>

		<table border="0" cellpadding="5" class="data" width="100%">

			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Subjek</th>
				<th>Tanggal</th>
				<th>Dibalas</th>
				<th>Aksi</th>
			</tr>
			<?php

				$kueri = "SELECT * FROM pesan ORDER BY id_pesan DESC";
				$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
				$jml_data = mysqli_num_rows($sql);

				if($jml_data < 1){
					echo "<tr><td colspan='6'>Tidak ada data yang dapat ditampilkan</td></tr>";
				}
				else{
					while($data = mysqli_fetch_array($sql)){
						$tanggal = tgl_indonesia($data['tanggal']);
			?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $data['nama']; ?></td>
				<td><?= $data['email']; ?></td>
				<td><a href="?tampil=pesan_balas&id=<?= $data['id_pesan']; ?>" class="link_aksi"><?= $data['subjek']; ?></a></td>
				<td><?= $tanggal; ?></td>
				<td>
					<?php

						if($data['balasan'] != ""){
							echo "Sudah";
						}
						else{
							echo "Belum";
						}

					?>
				</td>
				<td><a href="?tampil=pesan_hapus&id=<?= $data['id_pesan']; ?>" class="link_aksi">Hapus</a></td>
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