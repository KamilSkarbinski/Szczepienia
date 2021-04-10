<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Zmień telefon</title>
    <link rel="shortcut icon" href="syringe.png">

</head>
<body>
    <div id="zmiana">
        <form id="edycja" action = "" method = "POST">
            <b>Wpisz nowy numer telefonu</b></br>
                <input class="pole" type = "text" name = "telefon" required></br></br>
                <input class="edytuj2" type = "submit" name = "wyslij" value="Zmień">
        </form>
    </div>
</body>
</html>

<?php
    session_start();
    $_POST['login'] = $_SESSION['email'];
    if(isset($_POST['wyslij'])){
        $telefon = $_POST['telefon'];
        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");

        $sql = "UPDATE dane_uzytkownika SET `nr_telefonu` = '$telefon' WHERE `email` = '$_SESSION[email]'";
        header('location: szczegoly_konta.php');
        mysqli_query($base, $sql);
        mysqli_close($base);
    }

?> 