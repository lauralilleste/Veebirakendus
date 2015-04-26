<!DOCTYPE html>
<?php
include "header.php";
?>
		<div class="screen">
			<?php
			include "soovita_fn.php";
			?>
			
				<p>Riigikogu kandidaadid:</p>
				<?php
				include "dataRiigikogu.php";
				?>
			
			<
				<p>Omavalitsuste kandidaadid:.</p>
				<?php
				include "dataKohalik.php";
				?>
			
			
				<p>Presidendi kandidaadid.</p>
				<?php
				include "dataPresident.php";
				?>
			
		</div>
<?php
include "footer.php";
?>