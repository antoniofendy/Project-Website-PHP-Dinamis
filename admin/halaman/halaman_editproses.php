<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{
		function Cek(){
			if(!empty($_POST['judul']) && !empty($_POST['isi'])){
				return true;
			}
			else{
				return false;
			}
		}
?>

<?php
	
	$cek = Cek();

	if($cek == true){
		$kueri = "UPDATE halaman SET 
			judul = '$_POST[judul]',
			isi = '$_POST[isi]'
			WHERE id_halaman ='$_POST[id_halaman]'
		";

		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql){
			echo "Berhasil edit data";
		}
		else{
			echo "Gagal edit data";
		}
	}
	else{
		echo "Mohon lengkapi data terlebih dahulu";
	}

	echo "<meta http-equiv='refresh' content='1;
			url=?tampil=halaman'>";


	}
?>