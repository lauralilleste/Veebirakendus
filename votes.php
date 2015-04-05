<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
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

$sql_select = "SELECT SUM(Votes) AS value_1 FROM elections_tbl";
$stmt = $conn->query($sql_select);
$elections = $stmt->fetchAll(); 
if(count($elections) > 0) {
	print_r($elections);
	$sum = $elections['value_1'];
    echo "kokku on hääletatud: ";
    echo $sum;
} else {
    echo "<h3>Kedagi pole lisatud.</h3>";
}
?>



