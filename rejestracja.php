<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link rel="shortcut icon" href="syringe.png">
    <title>Rejestracja użytkownika</title>
</head>
<body>
    <div id="kontener">
        <h1>Stwórz swój profil i zarejestruj się na szczepienie!</h1>
        <div id="rejestracja">
            <div id="form">
                <form action="" method="POST">
                    <div id="czesc1">
                    <p>Imię</p>
                    <input class="pole" type="text" name="imie" required> <br/>
                    <p>Nazwisko</p>
                    <input class="pole" type="text" name="nazwisko" required> <br/>
                    <p>Wiek</p>
                    <input class="pole" type="number" name="wiek" required> <br/>
                    <p>PESEL</p>
                    <input class="pole" type="number" name="pesel" required> <br/>
                    </div>
                    <div id="czesc2">
                    <p>Adres Email</p>
                    <input class="pole" type="email" name="email" required> <br/>
                    <p>Podaj hasło</p>
                    <input class="pole" type="password" name="haslo" required> <br/>
                    <p>Powtórz hasło</p>
                    <input class="pole" type="password" name="powtorz_haslo" required> <br/>
                    <p>Numer telefonu</p>
                    <input class="pole" type="text" name="telefon" required> <br/>
                    </div>
                
                    <div id="dol">
                        <button type="submit" name="wyslij">Zarejestruj</button>
                    </div>
                    <div class="link">
                        <a href="logowanie.php">Masz już konto? Zaloguj się</a>
                    </div>
                </form>
            </div> 
        </div>
    </div>
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
            else echo "<div id='komunikat'>Hasła nie są takie same, spróbuj ponownie</div>";
        }
        else echo "<div id='komunikat'>Podany adres email posiada już konto</div>";
    }   
?>
</body>
</html>
