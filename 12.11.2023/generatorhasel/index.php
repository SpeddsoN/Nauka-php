<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Haseł</title>
    <style>
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
    #menu{
        
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
        display:flex;
        align-items:center;
        flex-direction:column;
    }

    .safe{
        width:20px;
        height:5px;
        top:20px;
        position:relative;
    }

    .green{
        background:green;
    }

    .yellow{
        background:yellow;
    }
    .red{
        background:red;
    }
    .none{
        background:grey;
    }
    .center{
        display:flex;
        width:100%;
        justify-content:center;
    }

    input[type=number]{
        background:none;
        border:1px solid rgba(69, 69, 69,0.0);
        border-bottom:1px solid rgba(69, 69, 69,0.7);
        transition:0.3s;
        border-left:2px solid rgba(69, 69, 69,0.0);
    }

    input[type=number]:focus-visible {
        outline: none !important;
        background:none;
        border-left:2px solid rgba(69, 69, 69,0.7);
        background:rgba(28, 28, 28,0.1);

    }
    input[type=number]:hover,
    input[type=number]:focus {
        -webkit-appearance: none;
        margin: 0;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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

    input[type=checkbox] {
         position: relative;
	       cursor: pointer;
    }
    input[type=checkbox]:before {
         content: "";
         display: block;
         position: absolute;
         width: 12px;
         height: 12px;
         top: 0;
         left: 0;
         border: 2px solid #555555;
         border-radius: 1px;
         background-color: rgb(40,40,40);
}
    input[type=checkbox]:checked:after {
         content: "";
         display: block;
         width: 3px;
         height: 8px;
         border: solid black;
         border-width: 0 2px 2px 0;
         -webkit-transform: rotate(45deg);
         -ms-transform: rotate(45deg);
         transform: rotate(45deg);
         position: absolute;
         top: 2px;
         left: 6px;
}
    </style>
</head>
<body>
    <div id="menu">
    <form method="POST">
        Dlugość hasła<input type="number" name="dlugosc" min-value="1"><br><br>    

        <span>Litery A-Z<input type="checkbox" name="litery" checked disabled></span><br>
        <span>Znaki (np @,!,%)<input type="checkbox" name="znaki"></span><br>
        <span>Liczby<input type="checkbox" name="liczby"></span><br>
        <span>Wielkie litery<input type="checkbox" name="wielkie"></span><br><br>

        <input type="submit" value="generuj"><br>
    </form>
    <?php

    $litery = 'abcdefghijklmnoprstuwxyz';
    $znaki = '';
    $liczby = '';
    $wielkie = '';

    $dlugosc = $_POST['dlugosc'];
    
    if(isset($_POST['znaki'])){
        $znaki = '!@#$%^&*';
    }
    if(isset($_POST['liczby'])){
        $liczby = '0123456789';
    }
    if(isset($_POST['wielkie'])){
        $wielkie = 'ABCDEFGHIJKLMNOPRSTUWXYZ';
    }

    $Zakres = ($litery . $znaki . $liczby . $wielkie);
    $haslo = '';

    for($i = 0; $i < $dlugosc; $i++){
        $haslo .= $Zakres[rand(0, strlen($Zakres) - 1)];
    }
    
    echo "Wygenerowane hasło to: " . $haslo . "<br><br> <div class='center'>Siła hasła: </div>" ;

    if($dlugosc < 6){
        echo"<span style='display:flex;gap:3px;'>
            <span class='safe red'></span>
             <span class='safe none'></span>
             <span class='safe none'></span>
             </span>";
    }else if($dlugosc >= 6 && $dlugosc < 10 ){
        echo"<span style='display:flex;gap:3px;'>
            <span class='safe yellow'></span>
             <span class='safe yellow'></span>
             <span class='safe none'></span>
             </span>";
    }else{
        echo"<span style='display:flex;gap:3px;'>
            <span class='safe green'></span>
             <span class='safe green'></span>
             <span class='safe green'></span>
             </span>";
    }
    ?>


    </div>

</body>
</html>