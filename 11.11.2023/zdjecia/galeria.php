<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wczytywanie Zdjęć</title>
    <style>
    a{
        height:10vh;
        font-weight:bold;
        font-size:2rem;
        text-decoration:none;
        color:#FFFDFA;
        text-shadow:1px 3px 3px rgba(15,15,15,0.5);
    }

        body{
            flex-direction: column;
        background: linear-gradient(140deg, rgba(33,33,33,1) 10%, rgba(145,31,159,1) 100%);
        background-attachment: fixed;
        display:flex;
        justify-content:center;
        align-items:center;
        height:80vh;
        font-family: Arial, sans-serif;
    }

        div{
            width:95vw;
            border-radius:10px;
            border:solid rgba(15,15,15,0.6);
            background:rgba(20,20,20,0.7);

        }


    </style>
</head>
<body>



<a href="wysylanie.php">Wyslij zdjęcia</a>
<div>
<?php
$folder = "zdjecia/";

// Otwórz folder
$dir = opendir($folder);

// Pętla przez pliki w folderze
while (($file = readdir($dir)) !== false) {
    // Sprawdź, czy to plik graficzny
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

    if (in_array($fileExtension, $allowedExtensions)) {
        // Wyświetl obrazek
        echo '<img src="' . $folder . $file . '" alt="' . $file . '" style="max-width: 200px; max-height: 200px; margin: 10px;">';
    }
}

// Zamknij folder
closedir($dir);
?>
</div>
</body>
</html>
