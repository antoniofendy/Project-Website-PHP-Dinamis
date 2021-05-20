<ul class="menu">

	<?php

		$kueri = "SELECT * FROM menu ORDER BY urutan ASC";
		$sql = mysqli_query($koneksi, $kueri) or die(mysqli_error($koneksi));
		while($data = mysqli_fetch_array($sql)){

	?>

			<li><a href="<?= $data['link']; ?>"><?= $data['judul']; ?></a>
				<ul class="submenu">
					
					<?php

						$kueri_submenu = "SELECT * FROM submenu WHERE id_menu = $data[id_menu] ORDER BY urutan ASC";
						$sql_submenu = mysqli_query($koneksi, $kueri_submenu) or die(mysqli_error($koneksi));
						while($data_submenu = mysqli_fetch_array($sql_submenu)){
					?>
							<li><a href="<?= $data_submenu['link']; ?>"><?= $data_submenu['judul']; ?></a></li>

					<?php
						}
					?>

				</ul>

			</li>

	<?php
		}
	?>
	
</ul>