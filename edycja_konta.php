<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja konta</title>

    <style>
        html{
            background-color:#F9DF97;
            font-family: 'Open Sans', sans-serif;
        }

        h1{
            text-align:center;
        }

        input{
            width:7%;
        }

        p{
            font-size: 110%;
        }
    
    </style>
    
</head>
<body>
    <h1>Witaj na stronie do edycji swojego konta!</h1>
    <h3>Wypełnij formularz niżej nowymi danymi swojego konta</h3>
    
    <form action="" method="POST">
        <p>Dane które tutaj wprowadzisz, zastąpią obecne, bądź rozważny</p>
        <p>Podaj numer identyfikacyjny i hasło konta którego szczegóły chcesz edytować</p>
        <input type = "number" name = "numer_id">
        <p>Podaj hasło</p>
        <input type = "password" name = "konto_haslo"> <br> <br>
        <p>Wprowadź imię</p>
            <input type = "text" name = "imie"> <br> <br>
        <p>Wprowadź nazwisko</p>
            <input type = "text" name = "nazwisko"> <br> <br>
        <p>Wprowadź swój wiek</p>
            <input type = "number" name = "wiek"> <br> <br>
        <p>Wprowadź swój pesel</p>
            <input type = "number" name = "pesel"> <br> <br>
        <p>Wprowadź swój email</p>
            <input type = "text" name = "email"> <br> <br>
        <p>Wprowadź swoje nowe hasło</p>
            <input type = "password" name = "haslo_konta"> <br> <br>
        <p>Wprowadź swój numer telefonu</p>
            <input type = "number" name = "numer_tel"> <br> <br>
        <input type = "submit" name = "zmiana" value = "Zmień swoje dane"> <br> <br>
    </form>

</body>
</html>

<?php

    if(isset($_POST['zmiana'])){
        $id = $_POST['numer_id'];
        $haslo_spr = $_POST['konto_haslo'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $wiek = $_POST['wiek'];
        $pesel = $_POST['pesel'];
        $email = $_POST['email'];
        $haslo = $_POST['haslo_konta'];
        $telefon = $_POST['numer_tel'];

        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");
        
            $sql = "UPDATE dane_uzytkownika SET `imie` = '$imie', `nazwisko` = '$nazwisko' , `wiek` = '$wiek' , `pesel` = '$pesel' , `email` = '$email' , `haslo` = '$haslo' , `nr_telefonu` = '$telefon' WHERE `uzytkownik_id` = '$id' AND `haslo` = '$haslo_spr'";
            mysqli_query($base, $sql);
            mysqli_close($base);
        
    }

?>