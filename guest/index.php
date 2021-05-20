<?php
	
	session_start();
	include("../lib/koneksi.php");
	define("INDEX",true);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pengunjung</title>
	
	<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
	<!-- ../js/jquery-3.5.1.min.js 
		[Link Via Google CDN]
		https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js
	-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="plugin/bootstrap-4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/guest.css">

</head>
<body>

	<div id="container">

		<header> 	
			<div class="container" style="margin: 0; padding: 0;">
				<img class="img-fluid" src="../css/img/header_guest.png"  alt="Responsive image" style="max-width: 100%; height: auto;">
			</div>
		</header>
		<div id="navbar">
			<?php include("menu.php"); ?>			
		</div>
		<div class="konten cf">
			<div id="konten_utama">
				<?php include("konten_utama.php"); ?>
			</div>
			<div id="sidebar">
				<?php include("sidebar.php"); ?>
			</div>
		</div>
		<div id="footer">
			<p>Copyright &copy; LahanKode</p>
		</div>
		
	</div>

	<script src="plugin/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>