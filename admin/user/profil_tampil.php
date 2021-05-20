<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='0;
				url=../index.php'>";
	}

	else{

		$kueri = "SELECT * FROM user ORDER BY id_user ASC";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div id="user">

		<form name="user_edit" method="post" action="?tampil=profil_editproses">
			<input type="hidden" name="id" value="<?= $data['id_user']; ?>">

			<table border="0" cellpadding="10">

				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="<?= $data['username']; ?>"></td>
				</tr>
				<tr>
					<td>Password baru</td>
					<td><input type="password" name="pwd"></td>
				</tr>
				<tr>
					<td>Konfirmasi password</td>
					<td><input type="password" name="pwd_confirm"></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td><input type="submit" name="edit" value="Edit Profil"></td>
				</tr>
				
			</table>
			
		</form>
		
	</div>

</body>
</html>

<?php

	}

?>

