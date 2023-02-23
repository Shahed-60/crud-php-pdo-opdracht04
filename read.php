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
$sql = "SELECT Id
              ,Kleuren
              ,Tel
              ,Email
              ,Afspraak
              ,Behandeling
              ,huidigeDatum
        FROM Afspraak";
//
$statement = $pdo->prepare($sql);

$statement->execute();


$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
              
              <td>$info->Kleuren</td>
              <td>$info->Tel</td>
              <td>$info->Email</td>
              <td>$info->Afspraak</td>
              <td>$info->Behandeling</td>
              <td>$info->huidigeDatum</td>
              <td>
              <a href='delete.php?Id=$info->Id'>
              <img src='img/b_drop.png' alt='kruis'>
          </a>
      </td>
      <td>
          <a href='update.php?Id=$info->Id'>
              <img src='img/b_edit.png' alt='potlood'>
          </a>
      </td>
              </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Bling Bling </h3>

    <a href="index.php">
        <input type="button" value="Nieuw record">
    </a>
    <br>
    <br>
    <table border='1'>
        <thead>

            <th>Kleuren</th>
            <th>Tel</th>
            <th>Email</th>
            <th>Afspraak</th>
            <th>Behandeling</th>
            <th>huidigeDatum</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?= $rows; ?>
        </tbody>
    </table>
</body>

</html>