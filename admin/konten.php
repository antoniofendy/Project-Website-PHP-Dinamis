<?php
	
	if(!defined("INDEX")){
		echo "<meta http-equiv ='referesh' content='1;
				url=index.php'>";
	}
	else{

?>

<?php

	if(isset($_GET['tampil'])){
		$tampil = $_GET['tampil'];
	}
	else{
		$tampil = "beranda";
	}

	if($tampil == "beranda"){
		include("beranda.php");
	}

	//konfigurasi menu [Menu]
	else if($tampil == "menu"){
		include("menu/menu_tampil.php");
	}
	else if($tampil == "menu_tambah"){
		include("menu/menu_tambah.php");
	}
	else if($tampil == "menu_tambahproses"){
		include("menu/menu_tambahproses.php");
	}
	else if($tampil == "menu_edit"){
		include("menu/menu_edit.php");
	}
	else if($tampil == "menu_editproses"){
		include("menu/menu_editproses.php");
	}
	else if($tampil == "menu_hapus"){
		include("menu/menu_hapus.php");
	}

	//konfigurasi menu [Halaman]
	else if($tampil == "halaman"){
		include("halaman/halaman_tampil.php");
	}
	else if($tampil == "halaman_tambah"){
		include("halaman/halaman_tambah.php");
	}
	else if($tampil == "halaman_tambahproses"){
		include("halaman/halaman_tambahproses.php");
	}
	else if($tampil == "halaman_edit"){
		include("halaman/halaman_edit.php");
	}
	else if($tampil == "halaman_editproses"){
		include("halaman/halaman_editproses.php");
	}
	else if($tampil == "halaman_hapus"){
		include("halaman/halaman_hapus.php");
	}

	//konfigurasi menu [artikel]
	else if($tampil == "artikel"){
		include("artikel/artikel_tampil.php");
	}
	else if($tampil == "artikel_tambah"){
		include("artikel/artikel_tambah.php");
	}
	else if($tampil == "artikel_tambahproses"){
		include("artikel/artikel_tambahproses.php");
	}
	else if($tampil == "artikel_edit"){
		include("artikel/artikel_edit.php");
	}
	else if($tampil == "artikel_editproses"){
		include("artikel/artikel_editproses.php");
	}
	else if($tampil == "artikel_hapus"){
		include("artikel/artikel_hapus.php");
	}

	//konfigurasi menu [galeri]
	else if($tampil == "galeri"){
		include("galeri/galeri_tampil.php");
	}
	else if($tampil == "galeri_tambah"){
		include("galeri/galeri_tambah.php");
	}
	else if($tampil == "galeri_tambahproses"){
		include("galeri/galeri_tambahproses.php");
	}
	else if($tampil == "galeri_edit"){
		include("galeri/galeri_edit.php");
	}
	else if($tampil == "galeri_editproses"){
		include("galeri/galeri_editproses.php");
	}
	else if($tampil == "galeri_hapus"){
		include("galeri/galeri_hapus.php");
	}

	//konfigurasi menu [pesan]
	else if($tampil == "pesan"){
		include("pesan/pesan_tampil.php");
	}
	else if($tampil == "pesan_balas"){
		include("pesan/pesan_balas.php");
	}
	else if($tampil == "pesan_balasproses"){
		include("pesan/pesan_balasproses.php");
	}
	else if($tampil == "pesan_hapus"){
		include("pesan/pesan_hapus.php");
	}

	//konfigurasi menu [submenu]
	else if($tampil == "submenu"){
		include("submenu/submenu_tampil.php");
	}
	else if($tampil == "submenu_tambah"){
		include("submenu/submenu_tambah.php");
	}
	else if($tampil == "submenu_tambahproses"){
		include("submenu/submenu_tambahproses.php");
	}
	else if($tampil == "submenu_edit"){
		include("submenu/submenu_edit.php");
	}
	else if($tampil == "submenu_editproses"){
		include("submenu/submenu_editproses.php");
	}
	else if($tampil == "submenu_hapus"){
		include("submenu/submenu_hapus.php");
	}

	//konfigurasi menu [profil]	
	else if($tampil == "profil"){
		include("user/profil_tampil.php");
	}
	else if($tampil == "profil_editproses"){
		include("user/profil_editproses.php");
	}

	else if($tampil == "keluar"){
		include("keluar.php");
	}

	else{
		echo "Konten tidak ditemukan";
	}

}

?>