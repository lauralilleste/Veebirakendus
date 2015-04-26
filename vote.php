<?php
// DB connection info
$host = "eu-cdbr-azure-north-c.cloudapp.net";
$user = "b17689f0b6725e";
$pwd = "ce8a018e";
$db = "soovitaDB";
// Connect to database.
try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(var_dump($e));
}
if(!empty($_POST)) {
	try {
		$vote_name = $_POST['vote_name'];
		// Insert data
		$sql = "UPDATE elections_tbl SET votes=votes+1 WHERE name='$vote_name'";
		if ($conn->query($sql) === TRUE) {
			echo "<script>
             alert('Hääl edukalt antud!'); 
             window.history.go(-2);
			</script>";
		} else {
			echo "<script>
             alert('Hääl antud!'); 
             window.history.go(-2);
			</script>";
		}
	}
	catch(Exception $e) {
		die(var_dump($e));
	}
}
?>
