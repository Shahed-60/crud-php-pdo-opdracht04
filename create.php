<?php
require('config.php');
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

$sql = "INSERT INTO Afspraak(Kleuren
                        ,Tel
                        ,Email
                        ,Afspraak
                        ,Behandeling
                        ,huidigeDatum)
                VALUES (:color
                        ,:tel
                        ,:email
                        ,:afspraak
                        ,:treatment
                        ,:huidigeDatum)";

$statement = $pdo->prepare($sql);
// $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_STR);
$statement->bindValue(':color', $_POST['color'], PDO::PARAM_STR);
$statement->bindValue(':tel', $_POST['tel'], PDO::PARAM_STR);
$statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$statement->bindValue(':afspraak', $_POST['date'], PDO::PARAM_STR);
$statement->bindValue(':treatment', ($_POST['treatment']), PDO::PARAM_STR);
$statement->bindValue(':huidigeDatum', ($_POST['huidigeDatum']), PDO::PARAM_STR);


$result = $statement->execute();
if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}
