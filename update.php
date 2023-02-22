<?php

require("config.php");

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        // echo "Er is een verbinding met de mysql-server";
    } else {
        echo "Er is een interne server-error, neem contact op met de beheerder";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // var_dump($_POST['Id']);
    // var_dump($_POST); djh
    // Maak een sql update-query en vuur deze af op de database

    try {
        $sql = "UPDATE Afspraak
                    SET Kleuren = :color,
                        Tel = :tel,
                        Email = :email,
                        Afspraak = :afspraak,
                        Behandeling = :treatment,
                        huidigeDatum = :huidigeDatum,
                    WHERE  Id = :Id";

        $statement = $pdo->prepare($sql);

        // $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
        $statement->bindValue(':color', $_POST['color'], PDO::PARAM_STR);
        $statement->bindValue(':tel', $_POST['tel'], PDO::PARAM_STR);
        $statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $statement->bindValue(':afspraak', $_POST['date'], PDO::PARAM_STR);
        $statement->bindValue(':treatment', ($_POST['treatment']), PDO::PARAM_STR);
        $statement->bindValue(':huidigeDatum', ($_POST['huidigDatum']), PDO::PARAM_STR);
        $statement->execute();
        // :)
        echo "Het updaten is gelukt";
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        echo "Het updaten is niet gelukt";
        header('Refresh:3; url=read.php');
    }
    // Stuur de gebruiker door naar de read.php pagina voor het overzicht met een header(Refresh) functie;
    exit();
}
$sql = "SELECT  Id
                        ,Kleuren
                        ,Tel
                        ,Email
                        ,Afspraak
                        ,Behandeling
                        ,huidigeDatum
                    FROM Afspraak
                    WHERE  Id = :Id";
// Maak de sql-query klaar om de $_GET['Id'] waarde te koppelen aan de placeholder :Id
$statement = $pdo->prepare($sql);

// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);


// Voer de query uit
$statement->execute();

// Haal het resultaat op met fetch en stop het object in de variabele $result
$result = $statement->fetch(PDO::FETCH_OBJ);
// print_r($result);

// var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De 5 snelste achtbanen van Europe</title>
</head>

<body>
    <h1>De 5 snelste achtbanen van Europe</h1>

    <form action="update.php" method="post">
        <input type="text" name="Id" value="<?php echo $result->Id; ?>" hidden>
        <label for="color">Kies 4 basiskleuren voor uw nagels:</label><br>
        <input type="color" name="color" id="color" value="<?php echo $result->Kleuren; ?>">
        <input type="color" name="color" id="color" value="<?php echo $result->Kleuren; ?>">
        <input type="color" name="color" id="color" value="<?php echo $result->Kleuren; ?>">
        <input type="color" name="color" id="color" value="<?php echo $result->Kleuren; ?>"><br>
        <br>
        <label for="pretpark">Naam Pretpark:</label><br>
        <input type="text" name="pretpark" id="pretpark" value="<?php echo $result->NaamPretpark; ?>"><br>
        <br>
        <label for="land">Naam Land:</label><br>
        <input type="text" name="land" id="land" value="<?php echo $result->Land; ?>"><br>
        <br>
        <label for="snelheid">Topsnelheid (km/u):</label><br>
        <input type="number" name="snelheid" id="snelheid" value="<?php echo $result->Topsnelheid; ?>"><br>
        <br>
        <label for="hoogte">Hoogte (m):</label><br>
        <input type="number" name="hoogte" id="hoogte" value="<?php echo $result->Hoogte; ?>"><br>
        <br>
        <label for="datum">Datum eerste opening:</label><br>
        <input type="date" name="datum" id="datum" value="<?php echo $result->Datum; ?>"><br>
        <br>
        <label for="cijfer">Cijfer:</label><br>
        <input type="range" id="myRange" step="0.1" max="10" oninput="updateContent()" name="cijfer" value="<?php echo $result->Cijfer; ?>">
        <span id="content"></span><br>
        <br>
        <input type="submit" name="submit" value="Sla Op">
    </form>

    <script src="eheh.js"></script>

</body>

</html>
</body>

</html>