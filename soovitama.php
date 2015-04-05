<!DOCTYPE html>
<?php
include "header.php";
?>
		<div class="screen">
		<p>tekst</p>
			<?php
			include "soovita_fn.php";
			?>
			<br/>
			<br/>
			<h3>Anna hääl kandidaadile:</h3>
			<form method="post" action="vote.php" enctype="multipart/form-data" >
				Name <input type="text" name="vote_name" id="vote_name"/></br>
				<input type="submit" name="submit" value="Anna hääl!" />
			</form>
			<br><br>

		</div>

<?php
include "footer.php";
?>