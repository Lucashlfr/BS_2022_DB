<!DOCTYPE html>
<html lang="en">
<head>
    <title>Projekt DB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php


    function getF($sql)
    {
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
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["counter"];
            }
        } else {
            echo "0 results";
        }

        $conn->close();
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

                        <li><a class="dropdown-item" href="createMarke.php">1. Marke anlegen</a>
                        <li><a class="dropdown-item" href="createModell.php">2. Modell anlegen</a></li>
                        <li><a class="dropdown-item" href="createReifen.php">3. Reifen anlegen</a></li>
                        <li><a class="dropdown-item" href="createAuto.php">4. Auto anlegen</a></li></li>
                        <li><a class="dropdown-item" href="createMieter.php">5. Mieter anlegen</a></li>
                        <li><a class="dropdown-item" href="createMietvorgang.php">6. Mapping anlegen</a></li>
                    </ul>
                </li>
                <a class="nav-link text-white" href="auswertung.php" role="button">Auswerten</a>
            </ul>
        </div>
    </div>
</nav>
<br>

<div class="container" style="max-width: 450px">

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Autos
            <span class="badge bg-primary rounded-pill">
              <?php
              getF("SELECT COUNT(uuid_auto) as counter FROM module_autos;");
              ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Mieter
            <span class="badge bg-primary rounded-pill">
                <?php
                getF("SELECT COUNT(uuid_mieter) as counter FROM module_mieter;");
                ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Offene Mietvorgänge
            <span class="badge bg-primary rounded-pill">
                <?php
                getF("SELECT COUNT(uuid_mieter) as counter FROM module_map_auto_mieter;");
                ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Modelle
            <span class="badge bg-primary rounded-pill">
                <?php
                getF("SELECT COUNT(uuid_modell) as counter FROM module_modells;");
                ?>
            </span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            Vermietete Autos der gleichen Marke
            <span class="badge bg-primary rounded-pill">
                <?php
                getF("SELECT COUNT(module_map_auto_mieter.uuid_auto) as counter FROM module_map_auto_mieter, module_autos, module_marken, module_modells
                                                   WHERE module_map_auto_mieter.uuid_auto = module_autos.uuid_auto
                                                     AND module_autos.uuid_modell = module_modells.uuid_modell
                                                     AND module_marken.uuid_marken = module_modells.uuid_marken");
                ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Vermietete Autos mit gleichem Mieter
            <span class="badge bg-primary rounded-pill">
                <?php
                getF("SELECT COUNT(module_map_auto_mieter.uuid_mieter) as counter FROM module_map_auto_mieter, module_mieter WHERE module_mieter.uuid_mieter=module_map_auto_mieter.uuid_mieter;");
                ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Gespeicherte Datensätze
            <span class="badge bg-primary rounded-pill">
                <?php
                getF("SELECT COUNT(*) as counter FROM module_autos, module_map_auto_mieter, module_marken, module_mieter, module_reifen;");
                ?>
            </span>
        </li>

    </ul>

</div>


</body>
</html>
