<?php

	if($_POST['log'] != "true"){
		echo "<meta http-equiv='refresh' content='1;
				url=index.php'>";
	}

	else{
	
		session_start();
		include("../lib/koneksi.php");

		$user = $_POST['username'];
		$pass = md5($_POST['pwd']);

		$cek = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
		$sql = mysqli_query($koneksi, $cek) or die(mysqli_error($koneksi));
		$jml_data = mysqli_num_rows($sql);
		$data = mysqli_fetch_array($sql);

		if($jml_data > 0){

			$_SESSION['username'] = $data['username'];
			$_SESSION['password'] = $data['password'];

			echo "<meta http-equiv='refresh' content='1;
					url=admin.php'>";
		}
		else{
			echo "<meta http-equiv='refresh' content='2;
					url=index.php'>";
		}
	}
	

?>