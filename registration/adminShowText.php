<?php

session_start();
$user = $_SESSION['username'];
//See original: https://www.w3schools.com/php/php_mysql_connect.asp
$servername = "db746401298.db.1and1.com";
$username = "dbo746401298";
$password = "Tr@vel000";
$dbName = "db746401298";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SESSION["displayBoolean"] == "true"){

	$textName = $_GET["textName"];

    $sql = "SELECT * FROM Assignments WHERE textName = '$textName'";
    $statement = $conn -> query($sql);

    foreach($statement as $row){
        $readingLevel = $row["readingLevel"];
        break;
    }

    $sql = "SELECT * FROM $readingLevel WHERE textName = '$textName'";
    $statement = $conn -> query($sql);

    foreach($statement as $row){
        $docName = $row["docName"];
    }

    print "<iframe src=" . "../" . $readingLevel . "./" . $docName . '" style="width:100%; height:98vh" id="realBookFrame"></iframe>';
}

}
catch(PDOException $e) {
    print "Connection failed: " . $e->getMessage();
}
?>
<script type="text/javascript">
    adjustHeightQuestions();
</script>
