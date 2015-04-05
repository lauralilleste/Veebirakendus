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
		echo "Hääl antud!";
	} else {
		echo "Antud kanditaati pole lisatud ";
	}
}
catch(Exception $e) {
    die(var_dump($e));
}
}

$sql_select = "SELECT * FROM elections_tbl";
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
    echo "<h3>KEdagi pole lisatud.</h3>";
}
?>
