<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="number" name="liczba">
        <input type="submit">
    </form>

    <?php
    

        
        if(isset($_POST['liczba'])){
            $liczba  = $_POST['liczba']; 
            for ($i = 2; $i <= sqrt($liczba); $i++) {
            if ($liczba % $i == 0) {
                echo "liczba " . $liczba . " nie jest liczbą pierwszą";
                return false; 
                

            }
        }        
        echo "liczba " . $liczba . " jest liczbą pierwszą";
        return true;
        }
    ?>
</body>
</html>