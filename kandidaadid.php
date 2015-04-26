<!DOCTYPE html>
<?php
include "header.php";
?>

		<div class="screen">
			<p>Täida ankeet ja kliki salvesta.</p>
			<form action="lihtneKandidaadiLisamine.php" method="post" >
				Valimised: 
					<input type="radio" id="election" value="riigikogu" checked>
					<label for="e1">Riigikogu valimised</label><br />
					<input type="radio" id="election" value="kohalik">
					<label for="e2">Kohaliku volikogu valimised</label><br />
					<input type="radio" id="election" value="president">
					<label for="e3">Presidendi valimised</label><br />
				Name <input type="text" name="name" id="name"/></br>
				Info <input type="text" name="info" id="info"/></br>
				Page <input type="text" name="page" id="page"/></br>
				
					Anna ka hääl?:
					<input type="radio" id="votes" name="votes" value="0" checked>
					<label for="e1">Ei</label><br />
					<input type="radio" id="votes" name="votes" value="1">
					<label for="e2">Jah</label><br />
				
				
				<input type="submit"  value="Salvesta" />
			</form>
			
			<div id="kandidaatideTabel">
				
			</div>
				
				<button type="button" onclick="loadXMLDoc()">
					Uuenda andmeid
				</button>
			
		</div>

<?php
include "footer.php";
?>