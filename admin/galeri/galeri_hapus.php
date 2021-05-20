<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{
		function HapusGambar($koneksi, $id_galeri){

			$kueri = "SELECT * FROM galeri WHERE id_galeri = '$id_galeri'";
			$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
			$data = mysqli_fetch_array($sql);
			$gbr = $data['gambar'];

			unlink("../image/galeri/$gbr");

		}
?>

<?php

	HapusGambar($koneksi, $_GET['id']);

	$kueri = "DELETE FROM galeri WHERE id_galeri = '$_GET[id]'";
	$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

	if($sql == true){
		echo "Berhasil hapus data";
	}
	else{
		echo "Gagal hapus data";
	}

	echo "<meta http-equiv = 'refresh' content='1;
			url=?tampil=galeri'>";


	}

?>