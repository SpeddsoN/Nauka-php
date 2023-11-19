<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        *{
            margin:0;
        }
        body{
            
            background: rgb(61,57,62);
            background: linear-gradient(120deg, rgba(61,57,62,1) 4%, rgba(43,43,43,1) 100%);
            height:100vh;
            display:flex;
            justify-content:center;
            flex-direction: column;
            align-items: center;
        }

        #chat-container{
            width:600px;
            margin:2.5vh;
            height:90vh;
            border:solid 1px #1f001b;
            border-radius:10px;
            flex-direction: column;
            display: flex;
            justify-content: space-between;
            background: linear-gradient(120deg, rgba(78,78,78,1) 4%, rgba(79,79,79,1) 100%);
        }

        form#chat-form{
            display: flex;
            justify-content: center;
            align-items: center;
            height:50px;
            border-top:1px solid #1f001b;
        }
        form>div{
            border-radius:5px;
            border:1px solid #1f001b;
        }
        input[type="text"],button[type="submit"]{
            border:none;
            background:none;
        }

        input[type="text"]{
            cursor:text;
        }
        button[type="submit"]{
            cursor: pointer;
        }
    </style>

</head>
<body data-login="<?php echo $wartosc_cookie; ?>">
    <h1>Prosty Chat</h1>
    <?php
    if (isset($_POST['wyloguj'])) {
        setcookie("login", "", time() - 3600, "/");
        header("Location: logowanie.php");
        exit;
    }

    if (isset($_COOKIE["login"])) {
        $wartosc_cookie = $_COOKIE["login"];
    } else {
        header("Location: logowanie.php");
        exit;
    }
    ?>
    <form method="post">
        <input type="submit" name="wyloguj" value="Wyloguj">
    </form>
    
    <div id="chat-container">
        <div id="chat-messages"></div>   
        <form id="chat-form">
            <div>
                <input type="text" id="message" placeholder="Wpisz wiadomość">
                <button type="submit">Wyślij</button>
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="chat.js"></script>
</body>
</html>

