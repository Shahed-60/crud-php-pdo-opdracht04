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
                        huidigeDatum = :huidigeDatum
                    WHERE  Id = :Id";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
        $statement->bindValue(':color', $_POST['color'], PDO::PARAM_STR);
        $statement->bindValue(':tel', $_POST['tel'], PDO::PARAM_STR);
        $statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $statement->bindValue(':afspraak', $_POST['date'], PDO::PARAM_STR);
        $statement->bindValue(':treatment', ($_POST['treatment']), PDO::PARAM_STR);
        $statement->bindValue(':huidigeDatum', ($_POST['huidigeDatum']), PDO::PARAM_STR);
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
    <title>Bling Bling Nagel chantal</title>
</head>

<body>
    <h1>Bling Bling Nagel chantal</h1>

    <form action="update.php" method="post">
        <input type="text" name="Id" value="<?php echo $result->Id; ?>" hidden>
        <label for="color">Kies 4 basiskleuren voor uw nagels:</label><br>
        <input type="color" name="color" id="color" value="<?php echo $result->Kleuren; ?>">
        <input type="color" name="color" id="color" value="<?php echo $result->Kleuren; ?>">
        <input type="color" name="color" id="color" value="<?php echo $result->Kleuren; ?>">
        <input type="color" name="color" id="color" value="<?php echo $result->Kleuren; ?>"><br>
        <br>
        <label for="tel">Uw telefoonnummer:</label><br>
        <input type="tel" name="tel" id="tel" value="<?php echo $result->Tel; ?>"><br>
        <br>
        <label for="email">Uw e-mailadres:</label><br>
        <input type="email" name="email" id="email" value="<?php echo $result->Email; ?>"><br>
        <br>
        <label for="date">Afspraak datum:</label><br>
        <input type="datetime-local" name="date" id="date" value="<?php echo $result->Afspraak; ?>"><br>
        <input type="hidden" name="huidigeDatum" value="<?= date('Y-m-d H:i:s'); ?>" value="<?php echo $result->huidigeDatum; ?>"><br>
        <br>
        <label for="treatment">Soort behandeling:</label><br>
        <input type="checkbox" name="treatment" id="treatment" value="<?php echo $result->Behandeling; ?>">
        <label for="treatment">Nagelbijt arrangement (termijnbetaling mogelijk) €180
        </label>
        <br>
        <input type="checkbox" name="treatment" id="treatment" value="<?php echo $result->Behandeling; ?>">
        <label for="treatment">Luxe manicure (massage en handpakking) €30,00</label>
        <br>
        <input type="checkbox" name="treatment" id="treatment" value="<?php echo $result->Behandeling; ?>">
        <label for="treatment">Nagelreparatie per nagel (in eerste week gratis) €5,00</label>
        <br>
        <input type="submit" value="Sla Op">
        <input type="reset" value="Reset">
    </form>

    <script src="eheh.js"></script>

</body>

</html>
</body>

</html>