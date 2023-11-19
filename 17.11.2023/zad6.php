<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rok przystępny</title>
</head>
<body>
    <form method="post">
        <input type="number" name="rok" placeholder="podaj rok: ">
        <input type="submit">
    </form>

    <?php
    if(isset($_POST['rok'])){
        $rok = $_POST['rok'];
        $tak = "rok jest przystępny";
        $nie = "rok nie jest przystępny";
        if($rok %4 == 0){
            if($rok %100 == 0){
                if($rok %400 == 0){
                    echo $tak;
                }else echo $nie;
        }else echo$tak;
        }else echo $nie;
        ;
    }
    
    ?>
</body>
</html>