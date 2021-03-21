<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły konta</title>
    

</head>
<body>
    <form action="" method="POST">
        <p>Podaj swój pesel, aby mieć dostęp do szczegółów swojego konta</p>
        <input type = "number" name = "numer_id">
        <p>Podaj hasło</p>
        <input type = "password" name = "haslo_konta"> <br> <br>
        <input type = "submit" name = "wyslij"> <br> <br>
    </form>

</body>
</html>

<?php
    if(isset($_POST['wyslij'])){
        $pesel = $_POST['numer_id'];
        $haslo =  $_POST['haslo_konta'];

        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");

        $sql = "SELECT * FROM `dane_uzytkownika` WHERE pesel = '$pesel' AND haslo = '$haslo'";

        $zapytanie = mysqli_query($base, $sql);
        while($row=mysqli_fetch_array($zapytanie)){
            echo "<h1>Szczegóły twojego konta!</h1> 
            <h3>Twoje id (Zapamiętaj!): ".$row[0]."<br> 
            Imię i nazwisko: ".$row[1]." ".$row[2]. " <a href = 'zmienimie.php'> Zmień imię</a><a href = 'zmiennazwisko.php'> Zmień nazwisko</a><br> 
            Wiek w latach: ".$row[3]." <a href = 'zmienwiek.php'> Zmień wiek</a><br> 
            Twój pesel: ".$row[4]. " <a href = 'zmienpesel.php'> Zmień PESEL</a> <br> 
            Twój email: ".$row[5]. " <a href = 'zmienemail.php'> Zmień e-mail</a><br> 
            Twoje hasło (Ważne!): ".$row[6]. " <a href = 'zmienhaslo.php'> Zmień hasło</a><br> 
            Twój numer telefonu: ".$row[7]. " <a href = 'zmientel.php'> Zmień numer telefonu</a> </h3>";
        }
        

        mysqli_close($base);
}
?>