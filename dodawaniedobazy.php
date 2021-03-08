<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rejestracja użytkownika</title>
</head>
<body>
    <h1>Stwórz swój profil i zarejestruj się na szczepienie!</h1>

    <form action="" method="POST">

        <p>Podaj imię</p>
        <input type="text" name="imie"> <br>
        <p>Podaj nazwisko</p>
        <input type="text" name="nazwisko"> <br>
        <p>Podaj swój wiek</p>
        <input type="number" name="wiek"> <br>
        <p>Podaj numer PESEL</p>
        <input type="number" name="pesel"> <br>
        <p>Wpisz swój adres Email</p>
        <input type="text" name="email"> <br>
        <p>Podaj hasło<p>
        <input type="password" name="haslo"> <br>
        <p>Powtórz hasło<p>
        <input type="password" name="powtorz_haslo"> <br>
        <p>Podaj swój numer telefonu</p>
        <input type="number" name="telefon"> <br> <br>
    
        <input type="submit" name="wyslij" value="Dodaj użytkownika">
    
    </form>
<?php
    if(isset($_POST['wyslij']))
    {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $wiek = $_POST['wiek'];
        $pesel = $_POST['pesel'];
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $powtorz_haslo = $_POST['powtorz_haslo'];
        $telefon = $_POST['telefon'];
        $base = mysqli_connect("localhost", "root", "", "szczepienia");

        if(mysqli_num_rows(mysqli_query($base, "SELECT `email` FROM `dane_uzytkownika` WHERE `email` = '".$email."';")) == 0)
        {
            if($haslo == $powtorz_haslo)
            {
                $sql = "INSERT INTO `dane_uzytkownika` (`uzytkownik_id`, `imie`, `nazwisko`, `wiek`, `pesel`, `email`, `haslo`, `nr_telefonu`) VALUES (NULL, '$imie', '$nazwisko', '$wiek', '$pesel', '$email', '$haslo', '$telefon')";
                mysqli_query($base, $sql);

                echo "Konto zostało pomyślnie utworzone!";
                header('Location: logowanie.php');
            }
            else echo "Hasła nie są takie same, spróbuj ponownie";
        }
        else echo "Podany adres email posiada już konto";
    }   
?>
</body>
</html>
