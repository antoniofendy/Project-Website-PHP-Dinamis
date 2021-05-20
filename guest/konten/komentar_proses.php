<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='1;
				url=../index.php'>";
	}
	else{

		$tgl = date('Y-m-d');

		$kueri = "INSERT INTO komentar SET 
					id_artikel = '$_POST[id_artikel]',
					nama = '$_POST[nama]',
					email = '$_POST[email]',
					komentar = '$_POST[isi_komentar]',
					tanggal = '$tgl'
				";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql == true){
			echo "Berhasil kirim komentar";
		}
		else{
			echo "Gagal kirim komentar";
		}
		echo "<meta http-equiv='refresh' content='1;
					url=?tampil=artikel_detail&id=$_POST[id_artikel]'>";

	}

?>