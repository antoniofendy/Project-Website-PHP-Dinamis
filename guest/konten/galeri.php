<?php

	if(!defined("INDEX")){
		echo "<meta http-equiv='refresh' content='1
				url=../index.php";
	}
	else{
?>

<style type="text/css">
	
	#cs_galeri .gambar{
		width: 170px;
		height: 100px;
		padding: 3px;
		border: 1px solid #ccc;
	}

	#cs_galeri td{
		font-size: 13px;
	}

	#cs_galeri a{
		text-decoration: none;
		color: black;
	}

</style>

<link rel="stylesheet" type="text/css" href="plugin\fancybox-master\dist\jquery.fancybox.css">
<script type="text/javascript" src="plugin\fancybox-master\dist\jquery.fancybox.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.fancybox').fancybox({
			'titleShow' : true,
			'titlePosition' : 'outside'
		});
	});
</script>

<div id="cs_galeri">

	<table cellpadding="5">
	
		<h2 class="judul">Galeri</h2>

		<?php

				$kueri = "SELECT * FROM galeri ORDER BY id_galeri ASC";
				$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
				$jml_data = mysqli_num_rows($sql);

				if($jml_data > 0){
					$no = 1;
					echo "<tr>";
					while($data = mysqli_fetch_array($sql)){	
		?>

		<td align="center">
			<a class="fancybox" href="../image/galeri/<?= $data['gambar']; ?>" title="<?= $data['judul']; ?>">

				<img src="../image/galeri/<?= $data['gambar']; ?>" class="gambar">
				<br><?= $data['judul'] ?>
			</a>
		</td>

		<?php
			if($no%4 == 0){
				echo "</tr><tr>";
			}
			$no++;

					}
					echo "</tr>";
				}
				else{
					echo "Tidak ada gambar yang dapat ditampilkan";
				}
		?>

	</table>

</div>

<?php
	}
?>