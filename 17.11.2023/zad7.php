<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprawdzanie czy są liczby takie same</title>
</head>
<body>
    <form method="post">
        <input placeholder="podaj ilość liczb" type="number" name="ilosc">
        <input type="submit">
        <?php
        if (isset($_POST['ilosc'])) {
            $ilosc = $_POST['ilosc'];
            echo "<br><br><form method='post'>";
            for ($i = 0; $i < $ilosc; $i++) {
                echo "<input type='number' name='liczba[]' placeholder='podaj liczbe nr " . ($i + 1) . "'><br>";
            }
            echo "<br><input type='submit'>";
            echo "</form>";

            if (isset($_POST['liczba'])) {
                $liczba = $_POST['liczba'];

                for ($i = 0; $i < count($liczba); $i++) {
                    for ($j = $i + 1; $j < count($liczba); $j++) {
                        if ($liczba[$i] == $liczba[$j]) {
                            echo "Liczby " . ($i + 1) . " i " . ($j + 1) . " są takie same. Liczba: " . $liczba[$i] . "<br>";
                        }
                    }
                }
            }
        }
        ?>
    </form>
    <br><br><br>
    <p style='color:grey;opacity:0.5;'>Lekko utrudniłem zadanie aby nie było zbyt proste</p>
</body>
</html>
