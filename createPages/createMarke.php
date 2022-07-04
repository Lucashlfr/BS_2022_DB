<!DOCTYPE html>
<html lang="en">
<head>
    <title>Projekt DB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .label {
            min-width: 140px;
        }
    </style>

</head>
<body>

<div class="container-fluid p-3 bg-info text-white text-center">
    <h1>Projekt DB - Autovermietung</h1>
    <p>Lucas Helfer & Lukas Geiser</p>
</div>
<br>

<div class="container-fluid">

    <div class="card card-body">

        <form action="/input/inputMarke.php" method="post">
            <h4 class="card-title">Marke anlegen</h4>
            <div class="input-group" style="margin-bottom: 10px">
                <span class="input-group-text label">Name</span>
                <input type="text" class="form-control" placeholder="Name" name="name">
            </div>
            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Abkürzung</span>
                <input type="text" class="form-control" placeholder="Abkürzung" name="abkuerzung">
            </div>
            <button class="btn btn-success" type="submit">Speichern</button>
        </form>
    </div>
    <br/>


    <table class="table">
        <thead>
        <tr>
            <th>UUID</th>
            <th>Name</th>
            <th>Abkürzung</th>
        </tr>
        </thead>
        <tbody>

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

        $sql = "SELECT uuid_marken, name, abkürzung FROM module_marken";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["uuid_marken"] . "</td><td>" . $row["name"] . "</td><td>" . $row["abkürzung"] . "</td></tr>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
        </tbody>
    </table>

</div>

</body>
</html>
