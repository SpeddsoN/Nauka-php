<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <p>Temperatura: </p><input type="number" id="temperatura" name="temperatura">
    <p>Wybierz jednostkę na którą zamieniasz: </p>
    <select id="jednostka" name="jednostka">
        <option value="celcjusz">celsjusz</option>
        <option value="fahrenheit">fahrenheit</option>
    </select>
    <br><input type="submit" value="oblicz">

    <?php
    $jednostka = $_POST['jednostka'];
    $temp = $_POST['temperatura'];

    if($jednostka == 'fahrenheit'){
        
        $fahrenheit = ($temp * 9/5) + 32;
        echo "<p>Temperatura celcjusza $temp na fahrenheita wynosi $fahrenheit</p>";
    } else{
        $celsius = ($temp - 32) * 5/9;
        echo "<p>Temperatura fahrenheita $temp na celcjusza wynosi $celsius</p>";
    }

    
    ?>
</form>
</body>
</html>