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
        <form action="/input/inputMieter.php" method="post">
            <h4 class="card-title">Marke anlegen</h4>
            <div class="input-group" style="margin-bottom: 10px">
                <span class="input-group-text label">Nachname</span>
                <input type="text" class="form-control" placeholder="Nachname" name="nachname">
            </div>
            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Vorname</span>
                <input type="text" class="form-control" placeholder="Vorname" name="vorname">
            </div>
            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Adresse</span>
                <input type="text" class="form-control" placeholder="Adresse" name="adresse">
            </div>
            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Geburtsdatum</span>
                <input type="date" class="form-control" placeholder="Geburtsdatum" name="geburtsdatum">
            </div>
            <div class="input-group " style="margin-bottom: 10px">
                <span class="input-group-text label">Führerschein</span>
                <input type="text" class="form-control" placeholder="Führerschein" name="fuehrerschein">
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
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Adresse</th>
                <th>Geburtsdatum</th>
                <th>Führerschein</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT uuid_mieter, name, vorname, adresse, gebdatum, führerschein_klassen FROM module_mieter";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["uuid_mieter"] . "</td><td>" . $row["name"] . "</td><td>" . $row["vorname"]
                        . "</td><td>" . $row["adresse"] . "</td><td>" . $row["gebdatum"] . "</td><td>"
                        . $row["führerschein_klassen"] . "</td></tr>";
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