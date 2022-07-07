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

$sql = "INSERT INTO module_reifen (uuid_reifen, bezeichnung, typ, hersteller) VALUES ('" . uniqid() ."', '" . $_POST["bezeichnung"]. "', '" . $_POST["typ"] . "', '" . $_POST["hersteller"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: /createReifen.php");
exit();

?>
