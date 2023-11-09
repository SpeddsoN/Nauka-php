<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie zadań</title>
</head>
<body>
    <form action="" method="post">
    <h2>Dodaj nowe zadanie</h2>
    <input type="text" name="zadanie">
    <input type="submit" value="dodaj">
    </form><br>
    <?php
    if(isset($_POST['zadanie'])){
        $lista = 'zadania.txt';
        $zadanie = $_POST['zadanie'];
        $plik = fopen($lista, 'a');
        fwrite($plik, $zadanie . "\n");
        fclose($plik);
        echo "Zadanie zostało dodane!<br>";
    }
?>
<br>
   <a href="zadania.php">Zobacz istniejące zadania</a>

    
</body>
</html>