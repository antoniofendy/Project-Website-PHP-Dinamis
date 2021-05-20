<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}

	else{
		function Cek(){
			$lokasi_gambar = $_FILES['gambar']['tmp_name'];
			if(!empty($_POST['judul']) && !empty($lokasi_gambar)){
				return true;
			}
			else{
				return false;
			}
		}

		function nama_gbr_baru($koneksi, $old_name){
			$kueri = "SHOW TABLE STATUS LIKE 'galeri'";
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

		$tanggal = date('Y-m-d');

		$nama_gambar_baru = nama_gbr_baru($koneksi, $nama_gambar);

		move_uploaded_file($lokasi_gambar, "../image/galeri/$nama_gambar_baru");

		$kueri = "INSERT INTO galeri SET 
					judul = '$_POST[judul]',
					gambar = '$nama_gambar_baru',
					tanggal = '$tanggal'
				";

		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql == true){
			echo "Berhasil tambah data";
		}
		else{
			echo "Gagal tambah data";
		}


	}
	else{
		echo "Mohon lengkapi data terlebih dahulu";
	}

	echo "<meta http-equiv = 'refresh' content='1;
			url=?tampil=galeri'>";


	}
?>