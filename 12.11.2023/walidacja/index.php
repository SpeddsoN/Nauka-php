<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walidacja</title>
</head>
<body>
    <form method="post">
        Podaj:<br>
        <input type="text" placeholder="e-mail" name="mail"><br>
        <input type="text" placeholder="hasło" name="haslo"><br>
        <input type="text" placeholder="numer telefonu" name="numer"><br>

        <input type="submit">      

    </form>

    <?php

if (isset($_POST['mail'])) $mail = $_POST['mail'];
if (isset($_POST['numer'])) $numer = $_POST['numer'];
if (isset($_POST['haslo'])) $haslo = $_POST['haslo'];

$wynikEmail = '';
$wynikHaslo = '';
$wynikNumer = '';

if (isset($mail)) {
    function walidacja_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    if (walidacja_email($mail)) {
        $wynikEmail = "Adres e-mail jest poprawny<br>";
    } else {
        $wynikEmail = "Adres e-mail jest niepoprawny<br>";
    }
}

if (isset($_POST['haslo'])) {
    function walidacja_hasla($pass) {
        return preg_match('/^[a-zA-Z0-9!@#$%^&*]{8,}$/', $pass);
    }

    if (walidacja_hasla($haslo)) {
        $wynikHaslo = "Hasło jest poprawne<br>";
    }else $wynikHaslo = "Hasło jest nie poprawne<br>";



}

if (isset($_POST['numer'])) {
    function walidacja_numeru($nr) {
        return preg_match('/^[0-9]{9}$/', $nr);
    }
    if (walidacja_numeru($numer)) {
        $wynikNumer = "Numer jest poprawny<br>";
    }else $wynikNumer = "Numer jest nie poprawny<br>";


}

echo $wynikEmail;
echo $wynikHaslo;
echo $wynikNumer;

    ?>
</body>
</html>