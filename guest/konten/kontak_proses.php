<?php

	if(defined("INDEX")){

		$pesan = addslashes($_POST['pesan']);

		$email = mail("layfenfen@gmail.coom", $_POST['subjek'], $pesan, "From: $_POST[email]");

		if($email == true){

			$tgl = date('Y-m-d');

			$kueri = "INSERT INTO pesan SET 
						nama = '$_POST[nama]',
						email = '$_POST[email]',
						subjek = '$_POST[subjek]',
						pesan = '$_POST[pesan]',
						tanggal = '$tgl'
					";
			$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

			if($sql == true){
				echo "Berhasil mengirim pesan";
			}

		}
		else{
			echo "Gagal mengirim pesan";
		}

	}

	echo "<meta http-equiv='refresh' content='1;
			url=?tampil=home'>";

?>