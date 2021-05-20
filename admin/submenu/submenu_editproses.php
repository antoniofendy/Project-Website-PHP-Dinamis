<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

		$kueri = "UPDATE submenu SET 
					judul = '$_POST[judul]',
					id_menu = '$_POST[induk]',
					link = '$_POST[link]',
					urutan = '$_POST[urutan]'
					WHERE id_submenu = '$_POST[id_submenu]'
				";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql == true){
			echo "Berhasil edit data submenu";
		}
		else{
			echo "Gagal edit data submenu";
		}
		echo "<meta http-equiv='refresh' content='1;
				url=?tampil=submenu'>";
	}

?>