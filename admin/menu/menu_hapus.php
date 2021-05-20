<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}

	else{

		$kueri = "DELETE FROM menu WHERE id_menu = '$_GET[id]'";

		$sql = mysqli_query($koneksi, $kueri) or die($koneksi);

		if($sql){
				echo "Berhasil hapus data";
			}
		else{
			echo "Gagal hapus data";
		}

		echo "<meta http-equiv='refresh' content='1;
				url=?tampil=menu'>";

	}
	
?>