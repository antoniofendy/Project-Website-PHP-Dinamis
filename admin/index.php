<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/adm_login.css">

</head>
<body>

	<div id = "container">
		
		<h2>Silahkan Login</h2>
		<form name="fm_login" method="post" action="cek_login.php">

			<input type="hidden" name="log" value="true">
			
			<label>Username</label>
			<input type="text" name="username" value="" class="input_box">

			<label>Password</label>
			<input type="Password" name="pwd" value="" class="input_box">

			<input type="submit" name="tb_login" value="LOGIN" class="bt_login">

			<a href="">Lupa Password?</a>



		</form>

	</div>

</body>
</html>