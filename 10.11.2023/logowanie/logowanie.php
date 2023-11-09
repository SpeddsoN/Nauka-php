<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
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

    input[type=text],input[type=password]{
        background:none;
        border:1px solid rgba(69, 69, 69,0.0);
        border-bottom:1px solid rgba(69, 69, 69,0.7);
        transition:0.3s;
        border-left:2px solid rgba(69, 69, 69,0.0);
    }

    input[type=text]:focus-visible,input[type=password]:focus-visible
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
        text-decoration:none;
        color:#e3e3e3;
        margin-top:10px;
        font-weight:bold;
    }    
    </style>
</head>
<body>
    <div>
        <h2>Zaloguj się</h2>
    <form method="post">
       <br><input type="text" id="login" name='login' placeholder="Login" style='color:#e3e3e3;' required><br>
        <br><input type="password" id="password" name='password' placeholder="Hasło" required><br>
        <input type="submit" value="Zaloguj"><br>
    </form>
    <a href="rejestracja.php">Zarejestruj się</a><br>
    <?php
$mysqli = new mysqli("localhost", "root", "", "uzytkownicy");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $login = isset($_POST['login']) ? $_POST['login'] : '';


    if ($result = $mysqli->query("SELECT * FROM login WHERE login = '$login' AND haslo = '$password'")) {
        if ($result->num_rows > 0) {
            
            header("location: index.php?login=$login");
        } else {
            echo "<b style='color:red;'>Złe dane logowania</b>";
        }
    }
}

$mysqli->close();
?>
    </div>
    
</body>
</html>