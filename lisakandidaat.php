
<p>Täida ankeet ja kliki <strong>salvesta</strong> .</p>
<form method="post" action="lisakandidaat.php" enctype="multipart/form-data" >
	Valimised: 
		<input type="radio" name="election" id="riigikogu" checked>
		<label for="e1">Riigikogu valimised</label><br />
		<input type="radio" name="election" id="kohalik">
		<label for="e2">Kohaliku volikogu valimised</label><br />
		<input type="radio" name="election" id="president">
		<label for="e3">Presidendi valimised</label><br />
	Name <input type="text" name="name" id="name"/></br>
	Info <input type="text" name="info" id="info"/></br>
	Page <input type="text" name="page" id="page"/></br>
	Anna ka hääl?:
		<input type="radio" name="votes" id="0" checked>
		<label for="e1">Ei</label><br />
		<input type="radio" name="votes" value="1">
		<label for="e2">Jah</label><br />
	<input type="submit" name="submit" value="Submit" />
</form>
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
    $sql_insert = "INSERT INTO registration_tbl (election, name, info, page, votes, date) 
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
echo "<h3>Kanditaat lisatud!</h3>";
}

$sql_select = "SELECT * FROM election_tbl";
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
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['election']."</td>";
        echo "<td>".$registrant['name']."</td>";
        echo "<td>".$registrant['info']."</td>";
        echo "<td>".$registrant['page']."</td>";
        echo "<td>".$registrant['votes']."</td>";
        echo "<td>".$registrant['date']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}
?>
