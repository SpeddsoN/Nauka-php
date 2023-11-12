<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizyta</title>
</head>
<body>
    <?php
    if(isset($_COOKIE['ostatnia_wizyta'])){
        $dataOstaniejWizyty = $_COOKIE['ostatnia_wizyta'];
        echo "Ostatnia wizyta: " . $dataOstaniejWizyty . "<br>";
    }else {
        echo "Witaj! Jest to twoja pierwsza wizyta. <br>";
    }
    $aktualnaData = date('Y-m-d H:i:s');
    setcookie('ostatnia_wizyta', $aktualnaData, time() + 3600, '/');  
    ?>

    <?php
    $dataOstatniejWizyty = isset($_COOKIE['ostatnia_wizyta']) ? $_COOKIE['ostatnia_wizyta'] : null;

    if ($dataOstatniejWizyty) {
        $aktualnaData = new DateTime();
        $dataOstatniejWizyty = new DateTime($dataOstatniejWizyty);
        $roznica = $aktualnaData->diff($dataOstatniejWizyty);

        echo "Minęło " . $roznica->days . " dni, " . $roznica->h . " godzin, " . $roznica->i . " minut i " . $roznica->s . " sekund od ostatniej wizyty";
    } else {
        echo "Witaj! To jest twoja pierwsza wizyta.";
    }
    ?>

</body>
</html>