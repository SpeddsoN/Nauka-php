<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
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
    </style>
</head>
<body>
    <div>
<?php
$login = $_GET['login'];
echo "Witaj $login. Zostałeś zalogowany!";
?>
</div>
</body>
</html>