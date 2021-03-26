<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Zmień email</title>


</head>
<body>
    <div id="zmiana">
        <form id="edycja" action = "" method = "POST">
            <b>Wpisz nowy adres email</b><br/>
                <input class="pole" type = "text" name = "email" required><br/><br/>
                <input class="edytuj2" type = "submit" name = "wyslij" value="Zmień"><br/><br/>
                <b>Uwaga!</b><br/> <p>Po zmienieniu adresu email nastąpi automatyczne wylogowanie.</p><br/>
        </form>
    </div>
</body>
</html>

<?php
    session_start();
    $_POST['login'] = $_SESSION['email'];
    if(isset($_POST['wyslij'])){
        $email = $_POST['email'];
        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");
        if(mysqli_num_rows(mysqli_query($base, "SELECT `email` FROM `dane_uzytkownika` WHERE `email` = '".$email."';")) == 0)
        {
            $sql = "UPDATE dane_uzytkownika SET `email` = '$email' WHERE `email` = '$_SESSION[email]'";
            mysqli_query($base, $sql);
            header('location: wyloguj.php');
        }
        else{
            echo "<br/>Podany adres email posiada już konto";
        }
        mysqli_close($base);
    }

?> 