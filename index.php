<!DOCTYPE html>
<?php
include "header.php";
?>
		<div class="screen">
			<div class="top">
				<p>Top 10 riigikogu kandidaati.</p>
				<?php include 'topriigikogu.php';?>
			</div>
			<div class="top">
				<p>Top 10 kohalike omavalitsuste kandidaati.</p>
				<?php include 'topkohalik.php';?>
			</div>
			<div class="top">
				<p>Top 10 presidendi kanditaati.</p>
				<?php include 'toppresident.php';?>
			</div>
		</div>
		
<?php
include "footer.php";
?>