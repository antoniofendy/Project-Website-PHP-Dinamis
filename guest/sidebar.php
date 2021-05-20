<?php
	
	if(defined("INDEX")){

?>

<div id="box">

	<div id="cari">

		<h2 class="side_judul">Pencarian</h2>
		
		<form name="cari" method="post" action="?tampil=pencarian">

			<table border="0" cellpadding="5">

				<tr>
					<td><input type="text" name="kata_kunci" placeholder="Masukan kata kunci"></td>
					<td><input type="submit" name="tb_cari" value="Cari"></td>
				</tr>
				
			</table>
			
		</form>

	</div>

	<div id="jam">
	
		<h2 class="side_judul">Jam</h2>
		<div class="clock" style="text-align: center;">
			<canvas class="CoolClock:Tumb" width="170" height="170"></canvas>
		</div>

	</div>

	
	<div id="video">

		<h2 class="side_judul">Video</h2>

		<iframe src="https://www.youtube.com/embed/bS9eXS6VucU" class="side_video" frameborder="0" allowfullscreen>
		</iframe>
		
	</div>

	<div id="artikel_terbaru">
		
		<h2 class="side_judul">Artikel Terbaru</h2>

		<ul>
			
			<?php

				$sql = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY tanggal DESC LIMIT 5") or die(mysqli_error($koneksi));
				while($data = mysqli_fetch_array($sql)){
					echo "<li><a href='?tampil=artikel_detail&id=$data[id_artikel]'>$data[judul]</a></li>";
				}
			?>

		</ul>

	</div>

	<div id="artikel_terpopuler">
		
		<h2 class="side_judul">Artikel Terpopuler</h2>

		<ul>
			
			<?php

				$sql = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY hits DESC LIMIT 5") or die(mysqli_error($koneksi));
				while($data = mysqli_fetch_array($sql)){
					echo "<li><a href='?tampil=artikel_detail&id=$data[id_artikel]'>$data[judul]</a></li>";
				}
			?>

		</ul>

	</div>

</div>

<script src="plugin/cool-clocks/coolclock.js" type="text/javascript"></script>
<script src="plugin/cool-clocks/moreskins.js" type="text/javascript"></script>

<?php
	}
?>