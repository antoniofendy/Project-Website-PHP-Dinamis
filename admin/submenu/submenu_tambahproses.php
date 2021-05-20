<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{
		function Cek($koneksi, $idmenu){

			$kueri_menu = "SELECT MAX(urutan) FROM submenu WHERE id_menu = '$idmenu'";
			$sql = mysqli_query($koneksi, $kueri_menu) or die(mysql_error($koneksi));
			$data = mysqli_fetch_array($sql);

			if(is_null($data[0])){
				return 0;
			}
			else{
				return $data[0];
			}
		}

?>

<?php

	$cek = Cek($koneksi, $_POST['induk']);

	if($_POST['urutan'] > $cek){
	
		$kueri = "INSERT INTO submenu SET 
					judul = '$_POST[judul]',
					id_menu = '$_POST[induk]',
					link = '$_POST[link]',
					urutan = '$_POST[urutan]'
				";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql == true){
			echo "Berhasil tambah submenu";
		}
		else{
			echo "Gagal tambah submenu";
		}
	}
	else{
		echo "Urutan sudah ada";
	}

	echo "<meta http-equiv='refresh' content='1;
				url=?tampil=submenu'>";

?>

<?php
	}
?>