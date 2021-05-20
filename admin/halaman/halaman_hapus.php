<?php
	
	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}

	else{
		$kueri = "DELETE FROM halaman WHERE id_halaman = '$_GET[id]'";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql){
			echo "Berhasil hapus data";
		}
		else{
			echo "Gagal hapus data";
		}

		echo "<meta http-equiv='refresh' content='1;
				url=?tampil=halaman'>";

	}
?>