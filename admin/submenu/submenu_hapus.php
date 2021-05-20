<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

		$kueri = "DELETE FROM submenu WHERE id_submenu = $_GET[id]";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($kueri));

		if($sql == true){
			echo "Berhasil hapus data submenu";
		}
		else{
			echo "Gagal hapus data submenu";
		}

		echo "<meta http-equiv='refresh' content='1;
				url=?tampil=submenu'>";

	}

?>