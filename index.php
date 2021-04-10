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
            $login = $_POST['email'];
            $_SESSION['email']=$row[0];          
        }

    if(!isset($login)){
        header('Location: logowanie.php?status=failed');
    }
}
if(isset($_POST['email'])){
    $login = $_POST['email'];
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="shortcut icon" href="syringe.png">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="main">
        <div id="menu">
            <ul class="menu">
                <li><a href="index.php">Strona główna</a></li>
                <li><a href="https://www.gov.pl/web/szczepimysie/mapa-punktow-szczepien#/" target="_blank">Punkty szczepień</a></li>
                <li><a href="wyloguj.php">Wyloguj</a></li>
                <div id="menu_right">
                    <li id="login"><a href="szczegoly_konta.php"><img src="avatar.png" alt="Avatar" class="avatar"></a></li>
                </div>
            </ul>
        </div>
        <div>
            <h1>Witaj <?php echo $_SESSION['email']?></h1>
            <div class="bg-img">
                <div class="container">
                    <form action="rezerwuj.php" method="POST">
                        <input class="box" type="submit" value="Wybierz termin" style="font-size:36px">
                    </form>
                    <form action="szczegoly_konta" method="POST">
                        <input type="hidden" value=<?php $_SESSION['email']?> name="login">
                    </form>
                </div>
            </div>    
            <footer class="footer">
                </br></br>
                Copyright © 2021 szczepienia
            </footer>
        </div>
    </div>
</body>
</html>