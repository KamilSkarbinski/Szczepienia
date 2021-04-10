<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Zmień hasło</title>
    <link rel="shortcut icon" href="syringe.png">

</head>
<body>
    <div id="zmiana">
        <form id="edycja" action = "" method = "POST">
            <b>Wpisz nowe hasło</b><br/>
                <input class="pole" type = "password" name = "haslo" required><br/>
            <b>Powtórz hasło</b><br/>
                <input class="pole" type = "password" name = "powtorz_haslo" required><br/><br/>
                <input class="edytuj2" type = "submit" name = "wyslij" value="Zmień">
        </form>
    </div>
</body>
</html>

<?php
    session_start();
    $_POST['login'] = $_SESSION['email'];
    if(isset($_POST['wyslij'])){
        $haslo = $_POST['haslo'];
        $powtorz_haslo = $_POST['powtorz_haslo'];
        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");
        if($haslo == $powtorz_haslo){
            $sql = "UPDATE dane_uzytkownika SET `haslo` = '$haslo' WHERE `email` = '$_SESSION[email]'";
            mysqli_query($base, $sql);
            header('location: szczegoly_konta.php');
        }
        else{
            echo "<br/>Hasła nie są takie same, spróbuj ponownie";
        }
        mysqli_close($base);
    }

?> 