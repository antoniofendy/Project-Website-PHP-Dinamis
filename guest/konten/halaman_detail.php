<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='1;
				url=../index.php'>";
	}
	else{

		//Update jumlah hits artikel
		mysqli_query($koneksi, "UPDATE artikel SET hits = hits+1 WHERE id_artikel = '$_GET[id]'");

		//Menampilkan isi artikel
		$kueri = "SELECT * FROM artikel WHERE id_artikel = '$_GET[id]'";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql); 

		include("../lib/fungsi_tgl_indonesia.php");
		$tgl = tgl_indonesia($data['tanggal']);

?>

<!DOCTYPE html>
<html>
<head>

	<title><?= $data['judul']; ?></title>
	
	<style type="text/css">

		.tanggal{
			margin-top: -13px;
			margin-bottom: 5px;
		}

		.gambar{
			width: 400px;
			height: 250px;
			margin-right: 10px;
			float: left;
			padding: 2px;
			border: 3px solid #240061;
		}

		.komen{
			background: #eee;
			width: 300px;
			padding: 5px;
			border: 1px solid #ccc;	
			margin-bottom: 3px;
			overflow: hidden;
		}

		.komen h4, p{
			margin: 0;
			padding: 0;
			font-size: 15px;
		}

		.komen p{
			padding-top: 3px;
			font-size: 13px;
			font-family: Open Sans;
		}

		.fm_komentar{
			padding: 5px;
			background: #eee;
			border: 1px solid lightgrey;
		
	</style>

</head>
<body>

	<h2><?= $data['judul']; ?></h2>
	<p class="tanggal"><?= "[".$tgl."]"; ?></p>
	<p>
		<?php if($data['gambar'] != "") ?>
			<img src="../image/artikel/<?= $data['gambar']; ?>" class="gambar">
		
		<?= $data['isi']; ?>
	</p>

	<?php

		$kueri_kmtr = "SELECT * FROM komentar WHERE id_artikel = '$_GET[id]'";
		$sql_kmtr = mysqli_query($koneksi, $kueri_kmtr) or die(mysqli_error($kueri_kmtr));
		$jml_kmtr = mysqli_num_rows($sql_kmtr);

		if($jml_kmtr > 0):
			echo "<h3>$jml_kmtr Komentar</h3>";
			while($data_kmtr = mysqli_fetch_array($sql_kmtr)):
				$tgl_komen = tgl_indonesia($data_kmtr['tanggal']);
	?>			
				<div class="komen">
					<h4><?= $data_kmtr['nama']." - ".$tgl_komen; ?></h4>
					<p><?= $data_kmtr['komentar']; ?></p>
				</div>
	<?php
			endwhile;
			else:
				echo "<h3>Belum ada komentar</h3>";
		endif;

	?>

	<br>
	<div class="fm_komentar">

		<h3>Kirim Komentar</h3>

		<form name="fm_komentar" method="post" action="?tampil=komentar_proses">
			<input type="hidden" name="id_artikel" value="<?= $_GET['id']; ?>">
			<table border="0" cellpadding="10">
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama" size="20"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" size="20"></td>
				</tr>
				<tr>
					<td valign="top">Komentar</td>
					<td><textarea name="isi_komentar" cols="50" rows="5"></textarea></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td><input type="submit" name="kirim" value="Kirim"></td>
				</tr>
			</table>
		</form>

	</div>

</body>
</html>

<?php

	}

?>