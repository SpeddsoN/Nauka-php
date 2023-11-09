<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
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

    input[type=text],input[type=email],input[type=password]{
        background:none;
        border:1px solid rgba(69, 69, 69,0.0);
        border-bottom:1px solid rgba(69, 69, 69,0.7);
        transition:0.3s;
        border-left:2px solid rgba(69, 69, 69,0.0);
    }

    input[type=text]:focus-visible,input[type=email]:focus-visible,input[type=password]:focus-visible
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
            color: rgba(227, 227, 227,0.5); /* Możesz zmienić ten kolor na dowolny inny */
        }

    a{
        text-decoration:none;
        color:#e3e3e3;
        margin-top:10px;
        font-weight:bold;
    }
    </style>
</head>
<body>
    <div>
        <h2>Zarejestruj się</h2>
    <form method="post">
       <br><input type="text" id="login" name='login' placeholder="Login" style='color:#e3e3e3;' required><br>
       <br><input type="email" id="e-mail" name='e-mail' placeholder="E-mail" style='color:#e3e3e3;' required><br>
        <br><input type="password" id="password" name='password' placeholder="Hasło" required><br>
        <input type="submit" value="Zarejestruj się"><br>
    </form>
    <a href="logowanie.php">Zaloguj się</a><br>
    <?php
$mysqli = new mysqli("localhost", "root", "", "uzytkownicy");

// Sprawdź, czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sprawdź, czy klucze istnieją w tablicy $_POST
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $mail = isset($_POST['e-mail']) ? $_POST['e-mail'] : '';

    $checkExistence = "SELECT * FROM login WHERE mail = '$mail'";
$result = $mysqli->query($checkExistence);

if ($result->num_rows > 0) {
    echo "Użytkownik o podanym adresie e-mail już istnieje.";
} else {
    $sql = "INSERT INTO login (login, mail, haslo) VALUES ('$login', '$mail', '$password')";
    $result = $mysqli->query($sql);

    if ($result) {
        echo "Rejestracja zakończona sukcesem.";
        echo "Za chwile zostaniesz przekierowany to weryfikacji.";
        slep(8);
        header("location: index.php?login=$login");
    } else {
        echo "Błąd podczas rejestracji: " . $mysqli->error;
    }
}
}
$mysqli->close();
?>
    </div>
    
</body>
</html>