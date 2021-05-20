<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv = 'refresh' content = '0;
				url=../index.php'>";
	}

	else{
		function HapusGambar($koneksi, $id_artikel){
			$kueri = "SELECT * FROM artikel WHERE id_artikel ='$id_artikel'";
			$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
			$data = mysqli_fetch_array($sql);

			if($data['gambar'] != ""){
				unlink("../image/artikel/$data[gambar]");
			}
		}
?>

<?php

	HapusGambar($koneksi, $_GET['id']);

	$kueri = "DELETE FROM artikel WHERE id_artikel = '$_GET[id]'";
	$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

	if($sql == true){
		echo "Berhasil hapus data";
	}
	else{
		echo "Gagal hapus data";
	}

	echo "<meta http-equiv='refresh' content='1;
			url=?tampil=artikel'>";

	}

?>