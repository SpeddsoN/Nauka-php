<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zad 4</title>
</head>
<body>
    <form method="post">
        <input placeholder="podaj ilość liczb" type="number" name="ilosc">
        <input type="submit">
    </form>

    <?php
    if (isset($_POST['ilosc'])) {
        $ilosc = $_POST['ilosc'];
        echo "<form method='post'><br><br>";
        for ($i = 0; $i < $ilosc; $i++) {
            echo "<input type='number' name='liczba[]' placeholder='podaj liczbe nr " . ($i + 1) . "'><br>";
        }
        echo "<br><input type='submit'>";
        echo "</form>";
    }
        if (isset($_POST['liczba'])) {
            $liczba = $_POST['liczba'];
            echo "Najmniejsza liczba " . min($liczba) . "<br>";
            echo "Największa liczba " . max($liczba) . "<br>";
        }
    
    ?>
</body>
</html>
