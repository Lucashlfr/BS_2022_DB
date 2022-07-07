<!DOCTYPE html>
<html lang="en">
<head>
    <title>Projekt DB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


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
    <div class="card">
        <div class="card-header text-center">SQL</div>
        <div class="card-body">

            <form method="post">

                <textarea class="form-control" rows="5" id="sql" name="sql" required style="margin-bottom: 5px"></textarea>
                <button class="btn btn-success" type="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>

            </form>

        </div>
    </div>
    <br>

    <div class="card">

        <div class="card-header text-center">

            <?php
            if (isset($_POST["sql"])) {
                echo "SQL CODE: " . $_POST["sql"];
            }else {
                echo "KEIN SQL";
            }
            ?>

        </div>

        <div class="card-body">

            <?php
            if (isset($_POST["sql"])) {
                $result = $conn->query($_POST["sql"]);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . implode(", ", $row) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "0 results";
                }


                $conn->close();
            }
            ?>

        </div>

    </div>

</div>


</body>
</html>