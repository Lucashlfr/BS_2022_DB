<?php

$servername = "localhost";
$username = "software";
$password = "GYdSQUW4fc0Dwh88";
$dbname = "berufsschule_sql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO module_autos (uuid_auto, uuid_modell, kennzeichen, uuid_reifen) VALUES ('" . uniqid() ."', '" . $_POST["modell"]. "', '" . $_POST["kennzeichen"] . "', '" . $_POST["reifen"] ."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: /createAuto.php");
exit();

?>
