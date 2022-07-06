<!DOCTYPE html>
<html lang="en">
<head>
    <title>Projekt DB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createAuto.php">Auto anlegen</a></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createModell.php">Modell anlegen</a></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createReifen.php">Reifen anlegen</a></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createMarke.php">Marke anlegen</a></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createMieter.php">Mieter anlegen</a></li>
                        <li><a class="dropdown-item" href="/BS_DB_2022/createPages/createMietvorgang.php">Mapping anlegen</a></li>
                    </ul>
                </li>
                <a class="nav-link text-white" href="/BS_DB_2022/auswertung.php" role="button">Auswerten</a>
            </ul>
        </div>
    </div>
</nav>

<?php
echo "<h1>TEST</h1>";
?>
</body>