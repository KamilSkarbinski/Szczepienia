<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły konta</title>
    
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
    <form action="" method="POST">
        <p>Podaj numer identyfikacyjny swojego konta, aby mieć dostęp do jego szczegółów </p>
        <input type = "number" name = "numer_id">
        <p>Podaj hasło</p>
        <input type = "password" name = "haslo_konta"> <br> <br>
        <input type = "submit" name = "wyslij"> <br> <br>
    </form>

</body>
</html>

<?php
    if(isset($_POST['wyslij'])){
        $id = $_POST['numer_id'];
        $haslo =  $_POST['haslo_konta'];

        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");

        $sql = "SELECT * FROM `dane_uzytkownika` WHERE uzytkownik_id = '$id' AND haslo = '$haslo'";

        $zapytanie = mysqli_query($base, $sql);
        while($row=mysqli_fetch_array($zapytanie)){
            echo "<h1>Szczegóły twojego konta!</h1> 
            <h3>Twoje id (Zapamiętaj!): ".$row[0]."<br> 
            Imię i nazwisko: ".$row[1]." ".$row[2]."<br> 
            Wiek w latach: ".$row[3]."<br> 
            Twój pesel: ".$row[4]."<br> 
            Twój email: ".$row[5]."<br> 
            Twoje hasło (Ważne!): ".$row[6]."<br> 
            Twój numer telefonu: ".$row[7]."</h3><br>";
        }
        
        echo "<a href='edycja_konta.php'><h2>Zmień dane swojego konta!</h2></a>";

        mysqli_close($base);
}
?>