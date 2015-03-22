<?php
// DB connection info

$host = "eu-cdbr-azure-north-c.cloudapp.net";
$user = "b17689f0b6725e";
$pwd = "ce8a018e";
$db = "soovitaDB";
try{
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql = "CREATE TABLE election_tbl(
                id INT NOT NULL AUTO_INCREMENT, 
                PRIMARY KEY(id),
				election VARCHAR(50),
                name VARCHAR(30),
                info VARCHAR(30),
				page VARCHAR(50),
				votes INTEGER,
                date DATE)";
    $conn->query($sql);
}
catch(Exception $e){
    die(print_r($e));
}
echo "<h3>Table created.</h3>";
?>