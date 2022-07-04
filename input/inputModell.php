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

$sql = "INSERT INTO module_modells (uuid_modell, uuid_marken, ausstattung, farbe, bezeichnung) VALUES ('" . uniqid() ."', '" . $_POST["marke"]. "', '" . $_POST["ausstattung"]
    . "', '" . $_POST["farbe"]. "', '" . $_POST["bezeichnung"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: /createPages/createModell.php");
exit();

?>
