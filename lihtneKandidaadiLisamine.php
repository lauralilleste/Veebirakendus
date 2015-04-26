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
	$election = $_POST['election'];
    $name = $_POST['name'];
    $info = $_POST['info'];
	$page = $_POST['page'];
	$votes = $_POST['votes'];
    $date = date("Y-m-d");
    // Insert data
    $sql_insert = "INSERT INTO elections_tbl (election, name, info, page, votes, date) 
                   VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindValue(1, $election);
    $stmt->bindValue(2, $name);
    $stmt->bindValue(3, $info);
	$stmt->bindValue(4, $page);
	$stmt->bindValue(5, $votes);
    $stmt->bindValue(6, $date);
    $stmt->execute();
}
catch(Exception $e) {
    die(var_dump($e));
}

}

?>