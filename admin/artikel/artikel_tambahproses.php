<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv = 'refresh' content = '0;
				url=../index.php'>";
	}
	else{
		function Cek(){
			$lokasi_gambar = $_FILES['gambar']['tmp_name'];
			if(!empty($_POST['judul']) && !empty($_POST['isi']) && !empty($lokasi_gambar)){
				return true;
			}
			else{
				return false;
			}
		}

		function nama_gbr_baru($koneksi, $old_name){
			$kueri = "SHOW TABLE STATUS LIKE 'artikel'";
			$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
			$data = mysqli_fetch_array($sql);
			$this_id = $data['Auto_increment'];

			//Mengubah nama gambar sesuai dengan id_artikel yang akan diberikan dbms, sehingga mencegah duplikasi nama gambar
			return ($this_id."_".$old_name);
		}
?>

<?php
	
	$cek = Cek();

	if($cek == true){

		$lokasi_gambar = $_FILES['gambar']['tmp_name'];
		$nama_gambar = $_FILES['gambar']['name'];
		$tipe_gambar = $_FILES['gambar']['type'];

		$isi = addslashes($_POST['isi']);
		date_default_timezone_set("Asia/Bangkok");
		$tanggal = date('Y-m-d H:i:s');

		if($lokasi_gambar != ""){
			$nama_gambar_baru = nama_gbr_baru($koneksi, $nama_gambar);
			move_uploaded_file($lokasi_gambar, "../image/artikel/$nama_gambar_baru");

			$kueri = "INSERT INTO artikel SET 
					judul = '$_POST[judul]',
					gambar = '$nama_gambar_baru',
					isi = '$isi',
					tanggal = '$tanggal'
				";
		}
		else{
			$kueri = "INSERT INTO artikel SET 
						judul = '$_POST[judul]',
						isi = '$isi',
						tanggal = '$tanggal'
					";
		}

		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));


		if($sql == true){
			echo "Berhasil tambah artikel";
		}
		else{
			echo "Gagal tambah artikel";
		}

	}
	else{
		echo "Mohon lengkapi data terlebih dahulu";
	}

	echo "<meta http-equiv='refresh' content='1;
			url=?tampil=artikel'>";

	}
?>