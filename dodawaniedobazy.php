<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie użytkowników do bazy danych</title>
</head>
<body>
    <h1>Stwórz swój profil i dodaj go do bazy danych!</h1>

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
        <p>Podaj haslo<p>
        <input type="password" name="haslo"> <br>
        <p>Podaj swój numer telefonu</p>
        <input type="number" name="telefon"> <br> <br>
    
        <input type="submit" name="wyslij" value="Dodaj użytkownika">
    
    </form>
</body>
</html>

<?php
if(isset($_POST['wyslij'])){
    $imie= $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $wiek = $_POST['wiek'];
    $pesel = $_POST['pesel'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $telefon = $_POST['telefon'];
    
    $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");

    $sql = "INSERT INTO `dane_uzytkownika` (`uzytkownik_id`, `imie`, `nazwisko`, `wiek`, `pesel`, `email`, `haslo`, `nr_telefonu`) VALUES (NULL, '$imie', '$nazwisko', '$wiek', '$pesel', '$email', '$haslo', '$telefon')";

    mysqli_query($base, $sql);
    mysqli_close($base);

}
?>

