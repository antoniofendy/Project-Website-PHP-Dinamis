<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=index.php'>";
	}

	else{

?>

<ul class="kiri">
	<li><a href="?tampil=beranda">Beranda</a></li>
	<li><a href="?tampil=menu">Menu</a></li>
	<li><a href="?tampil=halaman">Halaman</a></li>
	<li><a href="?tampil=artikel">Artikel</a></li>
	<li><a href="?tampil=galeri">Galeri</a></li>
	<li><a href="?tampil=pesan">Pesan</a></li>
	<li><a href="?tampil=submenu">Submenu</a></li>
</ul>

<ul class="kanan">
	<li><a href="../" target="blank">Preview</a></li>
	<li><a href="?tampil=profil">Profil</a></li>
	<li><a href="?tampil=keluar">Keluar</a></li>
</ul>

<?php

	}

?>