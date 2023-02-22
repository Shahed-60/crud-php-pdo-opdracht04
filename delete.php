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
// :)
// Maak een delete query voor het verwijderen van een record
$sql = "DELETE FROM Afspraak
        WHERE Id = :Id";
// :)
// Bereid de query voor om de placeholder te vervangen voor een id-waarde
$statement = $pdo->prepare($sql);

// Vervang de placeholder voor een id-waarde
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

// Voer de query uit op de mysql-database
$result = $statement->execute();

if ($result) {
    echo "Het record is verwijderd";
    header('Refresh:3; url=read.php');
} else {
    echo "Het record is niet verwijderd";
    header('Refresh:3; url=read.php');
}
