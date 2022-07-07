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

$sql = "INSERT INTO module_mieter (uuid_mieter, name, vorname, adresse, gebdatum, führerschein_klassen) VALUES ('"
    . uniqid() ."', '" . $_POST["nachname"]. "', '" . $_POST["vorname"] . "', '" . $_POST["adresse"]
    . "', '" . $_POST["geburtsdatum"] . "', '" . $_POST["fuehrerschein"] ."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: createMieter.php");
exit();

?>
