<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papier kamień nożyce</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>Gracz 1</legend>
            Papier<input type="radio" name="choice" value="papier"><br>
            Kamień<input type="radio" name="choice" value="kamien"><br>
            Nożyce<input type="radio" name="choice" value="nozyce"><br>
        </fieldset>
        
        <fieldset>
            <legend>Gracz 2</legend>
            Papier<input type="radio" name="choice2" value="papier"><br>
            Kamień<input type="radio" name="choice2" value="kamien"><br>
            Nożyce<input type="radio" name="choice2" value="nozyce"><br>
        </fieldset>

        <input type="submit" value="Submit">
        <br>
        <br>
        <?php
        if(isset($_POST['choice']) && isset($_POST['choice2'])){
            $gr1 = $_POST['choice'];
            $gr2 = $_POST['choice2'];
        
            function gra($gr1, $gr2){
                switch(true){
                    case $gr1 == $gr2:
                        echo "remis";
                        break;
                    case $gr1 == "papier" && $gr2 == "kamien":
                        echo "gracz 1 wygrywa";
                        break;
                    case $gr1 == "kamien" && $gr2 == "nozyce":
                        echo "gracz 1 wygrywa";
                        break;
                    case $gr1 == "nozyce" && $gr2 == "papier":
                        echo "gracz 1 wygrywa";
                        break;
                    default:
                        echo "gracz 2 wygrywa";
                }
            } 
            gra($gr1, $gr2);
        }else
        echo"nie wybrano odpowiedzi"
        ?>
    </form>
</body>
</html>
