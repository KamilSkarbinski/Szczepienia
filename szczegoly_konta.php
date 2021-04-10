<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Szczegóły konta</title>
    <link rel="shortcut icon" href="syringe.png">

</head>
<body>
    <div id="menu">
        <ul class="menu">
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="wyloguj.php">Wyloguj</a></li>
            <div id="menu_right">
                <li id="login"><a href="szczegoly_konta.php"><img src="avatar.png" alt="Avatar" class="avatar"></a></li>
            </div>
        </ul>
    </div>
    <?php
        session_start();
        $_POST['login'] = $_SESSION['email'];
        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");

        $sql = "SELECT `imie`,`nazwisko`,`wiek`,`pesel`,`email`,`haslo`,`nr_telefonu` FROM `dane_uzytkownika` WHERE email = '$_SESSION[email]'";
        $sql1 = "SELECT `res_date`,`res_slot` FROM `reservations` WHERE res_email = '$_SESSION[email]'";

        $zapytanie = mysqli_query($base, $sql);
        $zapytanie1 = mysqli_query($base, $sql1);
        while($row=mysqli_fetch_array($zapytanie)){
            echo "<h1>Szczegóły twojego konta!</h1>
            <table> 
            <tr><td class='td-left'><b>Imię:</b></td> <td class='td-mid'>".$row[0]. "</td><td class='td-right'></td></tr>
            <tr><td class='td-left'><b>Nazwisko:</b></td> <td class='td-mid'>".$row[1]. "</td><td class='td-right'></td></tr>
            <tr><td class='td-left'><b>Wiek:</b></td> <td class='td-mid'>".$row[2]. "</td><td class='td-right'></td></tr>
            <tr><td class='td-left'><b>Pesel:</b></td> <td class='td-mid'>".$row[3]. "</td><td class='td-right'></td></tr>
            <tr><td class='td-left'><b>Email:</b></td> <td class='td-mid'>".$row[4]. "</td><td class='td-right'><form action='zmienemail.php' method='POST'><input type='hidden' value=$_SESSION[email] name='login'/><input class='edytuj' type='submit' value='Edytuj'/></form></td></tr>
            <tr><td class='td-left'><b>Hasło:</b></td> <td class='td-mid'>".$row[5]. "</td><td class='td-right'><form action='zmienhaslo.php' method='POST'><input type='hidden' value=$_SESSION[email] name='login'/><input class='edytuj' type='submit' value='Edytuj'/></form></td></tr> 
            <tr><td class='td-left'><b>Numer telefonu:</b></td> <td class='td-mid'>".$row[6]. "</td><td class='td-right'><form action='zmientel.php' method='POST'><input type='hidden' value=$_SESSION[email] name='login'/><input class='edytuj' type='submit' value='Edytuj'/></form></td></tr></h3>
            </table>";
        }
        while($row=mysqli_fetch_array($zapytanie1)){
            echo "<h1>Szczegóły twojego szczepienia!</h1>
            <table> 
            <tr><td class='td-left'><b>Data:</b></td> <td class='td-mid'>".$row[0]. "</td><td class='td-right'></td></tr>
            <tr><td class='td-left'><b>Godzina:</b></td> <td class='td-mid'>".$row[1]. "</td><td class='td-right'><form action='anulujszczepienie.php' method='POST'><input type='hidden' value=$_SESSION[email] name='login'/><input class='edytuj' type='submit' name='anuluj' value='Anuluj'/></form></td></tr> 
            </table>";
        }
        mysqli_close($base);
    ?>
    </br></br>
</body>
</html>

<?php
?>