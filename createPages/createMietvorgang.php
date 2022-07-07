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
        <a class="navbar-brand" href="/BS_DB_2022/index.php">DB Projekt 2022</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">Anlegen</a>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createMarke.php">1. Marke anlegen</a>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createModell.php">2. Modell anlegen</a></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createReifen.php">3. Reifen anlegen</a></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createAuto.php">4. Auto anlegen</a></li></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createMieter.php">5. Mieter anlegen</a></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createMietvorgang.php">6. Mapping anlegen</a></li>
                    </ul>
                </li>
                <a class="nav-link text-white" href="/BS_DB_2022/auswertung.php" role="button">Auswerten</a>
            </ul>
        </div>
    </div>
</nav>
<br>

<div class="container">

    <div class="card card-body">

        <h4 class="card-title">Mietvorgang anlegen</h4>
        <form action="/BS_DB_2022/input/inputMietvorgang.php" method="post">
            <div class="input-group" style="margin-bottom: 10px">
                <span class="input-group-text label">Auto</span>
                <select type="text" class="form-control" name="auto">

                    <?php

                    $sql = "SELECT * FROM module_autos, module_modells, module_reifen, module_marken WHERE module_autos.uuid_modell = module_modells.uuid_modell AND module_modells.uuid_marken = module_marken.uuid_marken AND module_autos.uuid_reifen = module_reifen.uuid_reifen";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["uuid_auto"] . "'>" .
                                $row["name"] . ' ' . $row["bezeichnung"] . ' | ' .
                                $row["kennzeichen"] . ' | ' .
                                $row["bezeichnung"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>

                </select>
            </div>
            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Mieter</span>
                <select type="text" class="form-control" name="mieter">

                    <?php

                    $sql = "SELECT * FROM module_mieter";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["uuid_mieter"] . "'>" .
                                $row["name"] . ' | ' .
                                $row["vorname"] . ' | ' .
                                $row["adresse"] . "</option>";
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
        <table class="table">
            <thead>
            <tr>
                <th>UUID</th>
                <th>Auto</th>
                <th>Mieter</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM module_map_auto_mieter, module_mieter, module_autos, module_modells WHERE module_map_auto_mieter.uuid_mieter = module_mieter.uuid_mieter AND module_autos.uuid_auto = module_map_auto_mieter.uuid_auto AND module_autos.uuid_modell = module_modells.uuid_modell;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["uuid_mietvorgang"] . "</td><td>" . $row["kennzeichen"] . " " . $row["bezeichnung"] . "</td><td>" . $row["name"] . " " . $row["vorname"]
                        . "</td></tr>";
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
</html>