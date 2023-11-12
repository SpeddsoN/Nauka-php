<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <style>
         body{
        background: linear-gradient(140deg, rgba(33,33,33,1) 10%, rgba(145,31,159,1) 100%);
        background-attachment: fixed;
        display:flex;
        justify-content:center;
        align-items:center;
        height:80vh;
        font-family: Arial, sans-serif;
    }
    div{
        
        padding-left:60px;
        padding-right:60px;
        padding-top:70px;
        padding-bottom:100px;
        color:#e3e3e3;
        background:rgba(33, 33, 33,0.7);
        display:flex;
        align-items: center;
        flex-direction: column;
        border-radius:10px;
        box-shadow:5px 5px 10px rgba(10, 10, 10,0.7);
    }

    form{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input::file-selector-button{
        border:none;
        background:none;
        cursor:pointer;
        color:#e3e3e3;
        padding-top:3px;
        padding-bottom:3px;
        padding-left:7px;
        padding-right:7px;
        border:2px solid rgba(69, 69, 69,1);
        border-radius:5px;
        font-size:13px;
    }
    input[type=file]{
        font-size:0px;
    }

    input[type=file]:focus-visible
    {
        outline: -webkit-focus-ring-color auto 0px;
        background:none;
        border-left:2px solid rgba(69, 69, 69,0.7);

        background:rgba(28, 28, 28,0.1);

    }

    input[type=submit]{
        border:none;
        background:none;
        cursor:pointer;
        color:#e3e3e3;
        padding-top:3px;
        padding-bottom:3px;
        padding-left:7px;
        padding-right:7px;
        border:2px solid rgba(69, 69, 69,1);
        border-radius:5px;
    }

    ::placeholder {
            color: rgba(227, 227, 227,0.5); 
        }

        a{
        height:10vh;
        font-weight:bold;
        font-size:2rem;
        text-decoration:none;
        color:#FFFDFA;
        text-shadow:1px 3px 3px rgba(15,15,15,0.5);
    }

    </style>
</head>
<body>
    <div>
    <a href="galeria.php"> Zobacz zdjęcia</a><br>
    <form method="post" enctype="multipart/form-data">
        <input type="file" accept="image/png, image/jpeg" name="fileToUpload"/><br>
        <input type="submit" value="wyślij" name="submit"><br>
    </form>

    <?php
$katalog = "zdjecia/";
$plik = $katalog . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$Format = strtolower(pathinfo($plik, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] !== 4) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "Plik jest zdjęciem - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "Plik nie jest zdjęciem.<br>";
        }
    } else {
        echo "Nie wybrano pliku do przesłania.<br>";
    }
} else{
    ;
}

if (file_exists($plik)) {
    echo "Przepraszamy, to zdjęcie już istnieje.<br>";
    $uploadOk = 0;
}

if (!file_exists($katalog)) {
    mkdir($katalog, 0777, true);
}

if ($uploadOk == 0) {
    echo "Twoje zdjęcie nie zostało przesłane.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $plik)) {
        echo "Zdjęcie " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " zostało wysłane.";
        header("location: galeria.php");
    } else {
        echo "Przepraszamy, wystąpił błąd podczas wysyłania zdjęcia.";
    }
}
?>
</div>

</body>
</html>