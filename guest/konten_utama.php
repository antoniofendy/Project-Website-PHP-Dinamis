<?php
	
	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='1;
				url=index.php'>";
	}
	else{

		if(isset($_GET['tampil'])){
			$tampil = $_GET['tampil'];
		}
		else{
			$tampil = "home";
		}
?>

<div class="box">	

	<?php

		if($tampil == "home"){
			include("konten/home.php");
		}
		else if($tampil == "halaman"){
			include("konten/halaman.php");
		}
		else if($tampil == "galeri"){
			include("konten/galeri.php");
		}
		else if($tampil == "artikel_detail"){
			include("konten/halaman_detail.php");
		}
		else if($tampil == "kontak"){
			include("konten/kontak.php");
		}
		else if($tampil == "kontak_proses"){
			include("konten/kontak_proses.php");
		}
		else if($tampil == "pencarian"){
			include("konten/pencarian.php");
		}
		else if($tampil == "komentar_proses"){
			include("konten/komentar_proses.php");
		}
	}

	?>

</div>