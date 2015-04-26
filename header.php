<html manifest="manifest.appcache">	
	<HEAD> 
		<TITLE>
			Soovitus
		</TITLE>
		<meta charset="utf-8"> 
		<link href="style.css" rel="stylesheet" type="text/css" >
		<script src="fb.js"></script>
		<?php
		include "kandidaatideUuendamine.php";
		?>
	</HEAD>
	<body>
		<header>
			<h1>Poliitiline soovitusleht</h1>
		</header>
		<div id="style2"></div>
		<nav>			
			<a href="index.php">Avalehele</a>
			<a href="soovitajad.php">Soovitajad</a>
			<a href="soovitama.php">Soovitama</a>
			<a href="kandidaadid.php">Kandidaadid</a>
			<a href="kutsu.html">Kutsu</a>
			<div id="nimi"></div>
			<div class="fb-login-button" data-max-rows="1" data-size="large"
			 data-show-faces="false" data-auto-logout-link="true"></div>
		</nav>
		<div class="sidebar">
			<ul>
				<li><p>Reklaam vasakul servas</p></li>
			</ul>
		</div>
		<div class="sidebar2">
			<ul>
				<li><p>Reklaam paremal servas</p></li>
			</ul>
		</div>
