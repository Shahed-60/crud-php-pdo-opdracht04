<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bling Bling Nagel chantal</h1>
    <form action="create.php" method="post">
        <label for="color">Kies 4 basiskleuren voor uw nagels:</label><br>
        <input type="color" name="color" id="color">
        <input type="color" name="color" id="color">
        <input type="color" name="color" id="color">
        <input type="color" name="color" id="color"><br>

        <label for="tel">Uw telefoonnummer:</label><br>
        <input type="tel" name="tel" id="tel"><br>

        <label for="email">Uw e-mailadres:</label><br>
        <input type="email" name="email" id="email"><br>

        <label for="date">Afspraak datum:</label><br>
        <input type="datetime-local" name="date" id="date">
        <input type="hidden" name="huidigeDatum" value="<?= date('Y-m-d H:i:s'); ?>"><br>

        <label for="treatment">Soort behandeling:</label>
        <br>
        <input type="checkbox" name="treatment" id="treatment">
        <label for="treatment">Nagelbijt arrangement (termijnbetaling mogelijk) €180
        </label><br>

        <input type="checkbox" name="treatment" id="treatment">
        <label for="treatment">Luxe manicure (massage en handpakking) €30,00</label><br>

        <input type="checkbox" name="treatment" id="treatment">
        <label for="treatment">Nagelreparatie per nagel (in eerste week gratis) €5,00</label><br>

        <input type="submit" value="Sla Op">
        <input type="reset" value="Reset">

    </form>

</body>

</html>