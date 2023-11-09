

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <p>Waga</p><input type="number" id="waga" name="waga">
        <p>Wzrost</p><input type="number" id="wzrost" name="wzrost">
        <br><input type="submit" value="oblicz">
    </form>
    <?php
    $waga = $_POST["waga"];
    $wzrost = $_POST["wzrost"];
    $wzrost2 = $wzrost * $wzrost;
    $bmi = ($waga / $wzrost2) * 10000;
    echo "Twoje bmi wynosi: ".$bmi;
    ?>
</body>
</html>