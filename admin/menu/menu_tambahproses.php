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

		$kueri = "INSERT INTO menu SET 
					judul = '$_POST[judul]',
					link = '$_POST[link]',
					urutan = '$_POST[urutan]'
				";

		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql){
			echo "Berhasil tambah data";
		}
		else{
			echo "Gagal tambah data";
		}

	}
	echo "<meta http-equiv='refresh' content='1;
			url=?tampil=menu'>";


	}

?>