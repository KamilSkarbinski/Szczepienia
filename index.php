<?php
session_start();
if(isset($_POST['next'])){
    $email = $_POST['email'];
    $hasło = $_POST['haslo'];
    $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");
    $sql = "SELECT `email`, `haslo` FROM `dane_uzytkownika`";
    $result = mysqli_query($base,$sql);
    while($row = mysqli_fetch_array($result))
        if($row[0] == $email && $row[1] == $hasło){           
            $imie = $row[2];
        }

    if(!isset($email)){
        header('Location: logowanie.php?status=failed');
    }
}
if(isset($_POST['email'])){
    $email=$_POST['email'];
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="main">
        <div id="menu">
            <ul class="menu">
                <li><a href="zarezerwuj.php">Wybierz termin</a></li>
                <li><a href="szczegoly_konta.php">Szczegóły konta</a></li>
                <li><a href="wyloguj.php">Wyloguj</a></li>
            </ul>
        </div>
        <div>
            <div class="container">   
                <h1 class="main-title">Witaj w Panelu użytkownika <?php echo"$email"?></h1>
                <img src="szczepionka.jpeg" alt="szczepionkacovid">
                <footer class="footer">
                    Copyright © 2021 szczepienia
                </footer>
            </div>
        </div>
    </div>
</body>
</html>