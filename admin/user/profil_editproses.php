<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}

	else{

		function kueri_sql($koneksi, $kueri){
			mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
			echo "Berhasil edit data user";
		}


		if($_POST['pwd'] == "" && $_POST['pwd_confirm'] == ""){
			$kueri = "UPDATE user SET 
						username = '$_POST[username]'
						WHERE id_user = '$_POST[id]'
					";
			kueri_sql($koneksi, $kueri);
		}
		else{
			if($_POST['pwd'] == $_POST['pwd_confirm']){

				$pwd_in = md5($_POST['pwd']);

				$kueri = "UPDATE user SET 
						username = '$_POST[username]',
						password = '$pwd_in'
						WHERE id_user = '$_POST[id]'
					";

				kueri_sql($koneksi, $kueri);
			}
			else{
				echo "Password dan konfirmasi password tidak sesuai";

				echo "<meta http-equiv='refresh' content='2;
						url=?tampil=profil'>";
			}
		}

	}
?>
