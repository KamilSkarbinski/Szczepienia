<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmień imię</title>
    
    
</head>
<body>
    <form action = "" method = "POST">
        <p>Wpisz swoje nowe imie!</p>
            <input type = "text" name = "imie">
        <p>Potwierdź zmianę wpisując swoje hasło</p>
            <input type = "password" name = "haslo"> <br> <br>
            <input type = "submit" name = "wyslij"> <br> <br>
    </form>
</body>
</html>

<?php
    if(isset($_POST['wyslij'])){
        $imie = $_POST['imie'];
        $haslo =  $_POST['haslo'];
    
        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");

        $sql = "UPDATE dane_uzytkownika SET `imie` = '$imie' WHERE `haslo` = '$haslo'";
    
        mysqli_query($base, $sql);
        mysqli_close($base);
    }

?>