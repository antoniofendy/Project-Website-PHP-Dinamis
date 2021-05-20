<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='1;
				url=../index.php'>";
	}
	else{

		$kueri = "SELECT * FROM halaman WHERE id_halaman = $_GET[id]";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql);

		$isi = $data['isi'];

		//nl2br used to add break line <br> to a plain text
		//htmlentities used to convert the plain text into html format

		$convert_to_html = nl2br(htmlentities($isi, ENT_QUOTES));

?>

<style type="text/css">
	h2{
		font-size: 30px;
	}
	p{
		font-size: 40px;
	}
</style>

<h2><?= $data['judul']; ?></h2>
<!-- html_entitiy_decode used to decode the htmlformat into char || also the opposite of html_entities-->
<p><?= html_entity_decode($convert_to_html); ?></p>

<?php
	
	}

?>