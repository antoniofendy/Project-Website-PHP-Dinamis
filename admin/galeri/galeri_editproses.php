<?php
	
	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}

	else{
		function Cek(){
			if(!empty($_POST['judul'])){
				return true;
			}
			else{
				return false;
			}
		}

		function nama_gbr_baru($id_galeri, $nama_gbr){
			return ($id_galeri."_".$nama_gbr);
		}

		function HapusGambarLama($koneksi, $id_galeri){

			$kueri = "SELECT * FROM galeri WHERE id_galeri = '$id_galeri'";
			$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
			$data = mysqli_fetch_array($sql);
			$gbr_lama = $data['gambar'];

			unlink("../image/galeri/$gbr_lama");
		}
?>

<?php

	$cek = Cek();


	if($cek == true){

		$lokasi_gambar = $_FILES['gambar']['tmp_name'];

		$tanggal = date('Y-m-d');

		if($lokasi_gambar == ""){

			$kueri = "UPDATE galeri SET 
						judul = '$_POST[judul]',
						tanggal = '$tanggal'
						WHERE id_galeri = '$_POST[id_galeri]'
					";
		}
		else{

			HapusGambarLama($koneksi, $_POST['id_galeri']);


			$nama_gambar = $_FILES['gambar']['name'];

			$nama_gambar_baru = nama_gbr_baru($_POST['id_galeri'], $nama_gambar);
			move_uploaded_file($lokasi_gambar, "../image/galeri/$nama_gambar_baru");

			$kueri = "UPDATE galeri SET 
						judul = '$_POST[judul]',
						gambar = '$nama_gambar_baru',
						tanggal = '$tanggal'
						WHERE id_galeri = '$_POST[id_galeri]'
					";

		}

		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		if($sql == true){
			echo "Berhasil edit data";
		}
		else{
			echo "Gagal edit data";
		}

	}
	else{
		echo "Mohon lengkapi data terlebih dahulu";
	}

	echo "<meta http-equiv = 'refresh' content='1;
			url=?tampil=galeri'>";


	}

?>