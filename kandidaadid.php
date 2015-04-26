<!DOCTYPE html>
<?php
include "header.php";
?>

		<div class="screen">
			<p>Täida ankeet ja kliki salvesta.</p>
			<form action="lihtneKandidaadiLisamine.php" method="post" >
				Valimised: 
				<select id="election">
					<option value="riigikogu" selected >Riigikogu valimised</option>
					<option value="kohalik">Kohaliku omavalitsuse valmised</option>
					<option value="president">Presidendi valimised</option>
				</select>
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