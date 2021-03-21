<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmień hasło</title>
    
    
</head>
<body>
    <form action = "" method = "POST">
        <p>Wpisz swoje nowe haslo!</p>
            <input type = "password" name = "haslo">
        <p>Potwierdź zmianę wpisując swój PESEL</p>
            <input type = "number" name = "pesel"> <br> <br>
            <input type = "submit" name = "wyslij"> <br> <br>
    </form>
</body>
</html>

<?php
    if(isset($_POST['wyslij'])){
        $pesel = $_POST['pesel'];
        $haslo =  $_POST['haslo'];
    
        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");

        $sql = "UPDATE dane_uzytkownika SET `haslo` = '$haslo' WHERE `pesel` = '$pesel'";
    
        mysqli_query($base, $sql);
        mysqli_close($base);
    }

?>