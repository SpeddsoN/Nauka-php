<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Aktualne zadania</h2>
<?php
$lista = 'zadania.txt';
$zadania = file($lista, FILE_IGNORE_NEW_LINES);

if(!empty($zadania)){
    echo "Zapisane zadania:<br>";
    foreach($zadania as $index => $zadanie){
        echo"<div style='display:flex'>";
        echo "- $zadanie<br>";
        echo"<form method='post'>";
        echo"<input type='hidden' name='index' value='$index'>";
        echo"<input type='submit' value='x' style='border:0;background:white;color:red;font-weight:bold;'>";
        echo"</form><br>";
        echo"</div>";
    }
} else {
    echo "Nie masz żadnych zadań!";
}

if(isset($_POST['index'])){
    $index = $_POST['index'];
    unset($zadania[$index]);
    file_put_contents($lista, implode("\n", $zadania));
    echo "Zadanie zostało usunięte.";
    header("Location: zadania.php");
   
}
?>
 <br> <br><a href="index.php">Dodaj zadania</a>
</body>
</html>