<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}

	else{

		$kueri = "SELECT * FROM pesan WHERE id_pesan='$_POST[id]'";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql);
		$old_pesan = $data['balasan'];

		$email = mail($_POST['email'], $_POST['subjek'], $_POST['balasan'], "From: layfenfen@gmail.com");

		if($email == true){
			$kueri_2 = "UPDATE pesan SET balasan = '$_POST[balasan]' WHERE id_pesan = '$_POST[id]'";
			$sql_2 = mysqli_query($koneksi, $kueri_2) or die(mysqli_error($koneksi));

			echo "Berhasil balas pesan";
		}
		else{
			$kueri_2 = "UPDATE pesan SET balasan = '$old_pesan' WHERE id_pesan = '$_POST[id]'";
			$sql_2 = mysqli_query($koneksi, $kueri_2) or die(mysqli_error($koneksi));

			echo "Gagal balas pesan, kesalahan konfigurasi";
		}

		echo "<meta http-equiv='refresh' content='1;
					url=?tampil=pesan'>";

	}

?>