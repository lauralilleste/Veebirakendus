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

$sql_select = "SELECT * FROM elections_tbl Order by votes DESC LIMIT 10 where election='riigikogu'";
$stmt = $conn->query($sql_select);
$elections = $stmt->fetchAll(); 
if(count($elections) > 0) {
    echo "<h2>Lisatud kanditaadid:</h2>";
    echo "<table>";
    echo "<tr><th>Election</th>";
    echo "<th>Name</th>";
    echo "<th>Info</th>";
    echo "<th>Page</th>";
    echo "<th>Votes</th>";
    echo "<th>Date</th></tr>";
    foreach($elections as $election) {
        echo "<tr><td>".$election['election']."</td>";
        echo "<td>".$election['name']."</td>";
        echo "<td>".$election['info']."</td>";
        echo "<td>".$election['page']."</td>";
        echo "<td>".$election['votes']."</td>";
        echo "<td>".$election['date']."</td></tr>";
    }
    echo "</table>";
	mysql_close();
} else {
    echo "<h3>No one is currently registered.</h3>";
}
?>
