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

$sql_select = "SELECT Name, Votes FROM elections_tbl where election='riigikogu' Order by votes DESC LIMIT 10";
$stmt = $conn->query($sql_select);
$elections = $stmt->fetchAll(); 
if(count($elections) > 0) {
	print_r($elections);
    echo "<table>";
    echo "<tr><th>Name</th>";
    echo "<th>Votes</th></tr>";
    foreach($elections as $election) {
		print_r($election);
        echo "<tr><td>".$election['Name']."</td>";
        echo "<td>".$election['Votes']."</td></tr>";
    }
    echo "</table>";
	mysql_close();
} else {
    echo "<h3>No one is currently registered.</h3>";
}
?>
