<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv = 'refresh' content = '0;
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

		function nama_gbr_baru($id_artikel, $nama_gambar){		
			//Mengubah nama gambar sesuai dengan id_artikel yang akan diberikan dbms, sehingga mencegah duplikasi nama gambar
			return ($id_artikel."_".$nama_gambar);
		}
?>

<?php 

	$cek = Cek();

	if($cek == true){

		$isi = addslashes($_POST['isi']);
		$lokasi_gambar = $_FILES['gambar']['tmp_name'];
		date_default_timezone_set("Asia/Bangkok");
		$tanggal = date('Y-m-d H:i:s');

		if($lokasi_gambar == ""){
			$kueri = "UPDATE artikel SET 
						judul = '$_POST[judul]',
						isi = '$isi',
						tanggal = '$tanggal'
						WHERE id_artikel = '$_POST[id_artikel]'
					";
		}
		else{
			$kueri_lama = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel = '$_POST[id_artikel]'") or die(mysqli_error($koneksi));
			$data_lama = mysqli_fetch_array($kueri_lama);
			$gambar_lama = $data_lama['gambar'];

			unlink("../image/artikel/$gambar_lama");

			$nm_gambar = $_FILES['gambar']['name'];
			$nama_gambar_baru = nama_gbr_baru($_POST['id_artikel'], $nm_gambar);

			move_uploaded_file($lokasi_gambar, "../image/artikel/$nama_gambar_baru");

			$kueri = "UPDATE artikel SET 
						judul = '$_POST[judul]',
						isi = '$isi',
						gambar = '$nama_gambar_baru',
						tanggal = '$tanggal'
						WHERE id_artikel = '$_POST[id_artikel]'
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
	echo "<meta http-equiv='refresh' content='1;
			url=?tampil=artikel'>";

			
	}
?>