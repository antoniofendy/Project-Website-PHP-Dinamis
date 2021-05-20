<?php

	if(!defined("INDEX") || empty($_REQUEST['kata_kunci'])){
		echo "<meta http-equiv='refresh' content='1;
				url=../index.php'>";
	}
	else{

		$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
		$batas = 5;
		$posisi = ($hal-1)*$batas;

		$kueri = "SELECT * FROM artikel WHERE isi LIKE '%$_REQUEST[kata_kunci]%' ORDER BY id_artikel LIMIT $posisi, $batas";

		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));

		$jml_data = mysqli_num_rows($sql);

		if($jml_data < 1){
			echo "Kata yang dicari tidak ada";
		}
		else{

			include("../lib/fungsi_tgl_indonesia.php");

			while($data = mysqli_fetch_array($sql)){

				$isi = substr($data['isi'], 0, 800);
				$isi_tampil = substr($data['isi'], 0, strrpos($isi, " "));
				$tgl = tgl_indonesia($data['tanggal']);

?>

<div id="blok_artikel">
	
	<h2><?= $data['judul']; ?></h2>
	<p class="tgl"><?= "[".$tgl."]"; ?></p>

	<p>
		<?php if($data['gambar'] != "") ?>
			<img src="../image/artikel/<?= $data['gambar']; ?>" class="gbr_artikel">

		<?= $isi_tampil; ?> ... 
		<a href="?tampil=artikel_detail&id=<?= $data['id_artikel']; ?>" class="link_lengkap">Selengkapnya</a>

	</p>

</div>


<?php

				}

?>

<div class="paging">
	
	<?php

		$semua = "SELECT * FROM artikel WHERE isi LIKE '%$_REQUEST[kata_kunci]%'";
		$sql2 = mysqli_query($koneksi, $semua) or die(mysql_error($koneksi));
		$jml_artikel = mysqli_num_rows($sql2);

		$hal_sblm = $hal-1;
		$hal_ssdh = $hal+1;
		$jml_hal = ceil($jml_artikel/$batas);

		//Menampilkan halaman pertama dan halaman sebelumnya
		if($hal > 1){
			echo "<span><a href='?tampil=home&hal=1'> << </a></span>";
			echo "<span><a href='?tampil=home&hal=$hal_sblm'> < </a></span>";
		}
		else{
			echo "<span> << </span>";
			echo "<span> < </span>";
		}
		//*********************************************************************

		//Menampilkan HALAMAN SEKUENSIAL apabila jumlah halaman kurang dari 3
		//Perbedaanya terdapat pada looping
		if($jml_hal <= 3){
			for($i=1; $i<=$jml_hal; $i++){
				if($i==$hal){
					echo "<span><b>$i</b></span>";
				}
				else{
					echo "<span><a href='?tampil=home&hal=$i'>$i</a></span>";
				}
			}
		}
		//*********************************************************************

		//Menampilkan HALAMAN SEKUENSIAL apabila jumlah halaman lebih dari 3 dan //halaman yang sedang tampil merupakan halaman diantara halaman pertama dan //terakhir
		//Perbedaanya terdapat pada looping
		if($jml_hal > 3 && $hal > 1 && $hal < $jml_hal){
			for($i = $hal_sblm; $i <= $hal_ssdh; $i++){
				if($i==$hal){
					echo "<span><b>$i</b></span>";
				}
				else{
					echo "<span><a href='?tampil=home&hal=$i'>$i</a></span>";
				}
			}
		}
		//*********************************************************************
		
		//Menampilkan HALAMAN SEKUENSIAL apabila jumlah halaman lebih dari 3 dan //halaman yang sedang tampil merupakan halaman pertama
		//Perbedaanya terdapat pada looping
		if($jml_hal > 3 && $hal == 1){
			for($i=1; $i<=3; $i++){
				if($i==$hal){
					echo "<span><b>$i</b></span>";
				}
				else{
					echo "<span><a href='?tampil=home&hal=$i'>$i</a></span>";
				}
			}
		}
		//*********************************************************************

		//Menampilkan HALAMAN SEKUENSIAL apabila jumlah halaman lebih dari 3 dan //halaman yang sedang tampil merupakan halaman terakhir
		//Perbedaanya terdapat pada looping
		if($jml_hal > 3 && $hal == $jml_hal){
			for($i=$hal_sblm-1; $i<=$jml_hal; $i++){
				if($i==$hal){
					echo "<span><b>$i</b></span>";
				}
				else{
					echo "<span><a href='?tampil=home&hal=$i'>$i</a></span>";
				}
			}
		}
		//*********************************************************************

		//Menampilkan halaman sesudah halaman yang sedang tampil dan 
		//menampilkan halaman terakhir
		if($hal < $jml_hal){
			echo "<span><a href='?tampil=home&hal=$hal_ssdh'> > </a></span>";
			echo "<span><a href='?tampil=home&hal=$jml_hal'> >> </a></span>";
		}
		else{
			echo "<span> > </span>";
			echo "<span> >> </span>";
		}
		//*********************************************************************


	?>

</div>


<?php
		}
	}
		
?>