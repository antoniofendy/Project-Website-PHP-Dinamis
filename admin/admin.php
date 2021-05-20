<?php

	session_start();

	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
		echo "<meta http-equiv='refresh' content='1;
				url=index.php'>";
	}
	else{
	
		
		include("../lib/koneksi.php");

		define("INDEX", true);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>

	<div id="container">

		<div id="header"></div>
		<div id="menu">
			<?php include("menu.php"); ?>
		</div>
		<div id="konten">
			<?php include("konten.php"); ?>
		</div>
		<div id="footer">	
			<p>Copyright &copy; Belajar</p>
		</div>
		
	</div>

</body>
</html>

<?php

	}

?>