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

$sql_select = "SELECT Name, Votes FROM elections_tbl where election='president' Order by votes DESC";
$stmt = $conn->query($sql_select);
$elections = $stmt->fetchAll(); 
if(count($elections) > 0) {
    echo "<table>";
    echo "<tr><th>Name</th>";
    echo "<th>Votes</th></tr>";
    foreach($elections as $election) {
        echo "<tr><td>".$election['Name']."</td>";
        echo "<td>".$election['Votes']."</td></tr>";
    }
    echo "</table>";
	mysql_close();
} else {
    echo "<h3>No one is currently registered.</h3>";
}
?>