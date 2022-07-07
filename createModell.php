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
    ?>

</head>
<body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark" style="background-color: rgb(0,0,102)!important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">DB Projekt 2022</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">Anlegen</a>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="/createMarke.php">1. Marke anlegen</a>
                        <li><a class="dropdown-item" href="/createModell.php">2. Modell anlegen</a></li>
                        <li><a class="dropdown-item" href="/createReifen.php">3. Reifen anlegen</a></li>
                        <li><a class="dropdown-item" href="/createAuto.php">4. Auto anlegen</a></li></li>
                        <li><a class="dropdown-item" href="/createMieter.php">5. Mieter anlegen</a></li>
                        <li><a class="dropdown-item" href="/createMietvorgang.php">6. Mapping anlegen</a></li>
                    </ul>
                </li>
                <a class="nav-link text-white" href="/auswertung.php" role="button">Auswerten</a>
            </ul>
        </div>
    </div>
</nav>
<br>

<div class="container">
    <div class="card card-body">

        <form action="/php/inputnput/inputModell.php" method="post">
            <h4 class="card-title">Modell anlegen</h4>
            <div class="input-group" style="margin-bottom: 10px">
                <span class="input-group-text label">Ausstattung</span>
                <input type="text" class="form-control" placeholder="Ausstattung" name="ausstattung">
            </div>
            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Farbe</span>
                <input type="text" class="form-control" placeholder="Farbe" name="farbe">
            </div>
            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Bezeichnung</span>
                <input type="text" class="form-control" placeholder="bezeichnung" name="bezeichnung">
            </div>

            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Marke</span>
                <select type="text" class="form-control" name="marke">

                    <?php

                    $sql = "SELECT * FROM module_marken";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["uuid_marken"] . "'>" . $row["name"] . " / " . $row["abkuerzung"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>

                </select>
            </div>
            <button class="btn btn-success" type="submit">Speichern</button>

        </form>
    </div>

    <br/>

    <div class="container">
    <table class="table ">
        <thead>
        <tr>
            <th>UUID</th>
            <th>Austattung</th>
            <th>Farbe</th>
            <th>Bezeichnung</th>
            <th>Marke</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $sql = "SELECT * FROM module_modells, module_marken WHERE module_modells.uuid_marken = module_marken.uuid_marken";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["uuid_modell"] . "</td><td>" . $row["ausstattung"] . "</td><td>" . $row["farbe"] . "</td><td>" . $row["bezeichnung"]. "</td><td>" . $row["name"] . "</td></tr>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
    </div>
</div>
</body>


<?php

?>
</html>