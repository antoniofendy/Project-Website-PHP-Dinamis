<?php
	
	include("../../lib/koneksi.php");

	$kueri = "SELECT * FROM user";
	$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($kueri));
	$data = mysqli_fetch_array($sql);

	$pwd = $data['password'];

	$cek_pwd = md5("admin");

	if($pwd == $cek_pwd){
		echo "Benar"." ";
		echo $pwd." ";
		echo $cek_pwd;
	}
	else{
		echo "Salah";

	}

?>