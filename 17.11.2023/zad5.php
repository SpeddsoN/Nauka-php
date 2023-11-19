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
    if(isset($_POST['waga'],$_POST['wzrost'])){
    $waga = $_POST["waga"];
    $wzrost = $_POST["wzrost"];
    $wzrost2 = $wzrost * $wzrost;
    $bmi = ($waga / $wzrost2) * 10000;
    echo "Twoje bmi wynosi: " . $bmi . "<br>";

    echo "Kategoria: ";

    if($bmi<16){
        echo "Wygłodnienie";
    } else if($bmi>=16 && $bmi<17){
        echo "Wychudzenie";
    } else if($bmi>=17 && $bmi<18.5){
        echo "Niedowaga";
    } else if($bmi>=18.5 && $bmi<25){
        echo "Pożądana masa ciała";
    } else if($bmi>=25 && $bmi<30){
        echo "Nadwaga";
    } else if($bmi>=30 && $bmi<35){
        echo "Otyłość 1 stopnia";
    } else if($bmi>=35 && $bmi<40){
        echo "Otyłość 2 stopnia";
    } else if($bmi>=40){
        echo "Otyłość 3 stopnia";
    }
}
    ?> 
</body>
</html>