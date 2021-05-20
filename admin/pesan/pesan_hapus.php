<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}
	else{

		$kueri = "DELETE FROM pesan WHERE id_pesan = '$_GET[id]'";
		$sql = mysqli_query($koneksi, $kueri);

		if($sql == true){
			echo "Berhasil hapus pesan";
		}
		else{
			echo "Gagal hapus pesan";
		}

		echo "<meta http-equiv='refresh' content='1;
				url=?tampil=pesan'>";

	}

?>