<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{
	
		function Cek(){
			if(!empty($_POST['judul']) && !empty($_POST['link']) && !empty($_POST['urutan'])){
				return true;
			}
			else{
				return false;
			}
		}

?>

<?php
	
	if(!defined("INDEX")){
		echo "";
	}

	$cek = Cek();
	if($cek == false){
		echo "Mohon isi data dengan lengkap";
	}
	else{
		$kueri = "UPDATE menu SET 
					judul = '$_POST[judul]',
					link = '$_POST[link]',
					urutan = '$_POST[urutan]'
					WHERE id_menu = $_POST[id_menu]
				";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql){
			echo "Berhasil edit data";
		}
		else{
			echo "Gagal edit data";
		}

		echo "<meta http-equiv='refresh' content='1;
					url=?tampil=menu'>";
	}

	}

?>