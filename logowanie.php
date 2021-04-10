<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <link rel="shortcut icon" href="syringe.png">
    <title>Logowanie użytkownika</title>
</head>
<body>
    <div id="container">
        <div id="logowanie">
            <div id="form">
                <form action="index.php" method="POST">
                    <b>Email:</b><br/><br/> <input class="pole" type="email" name="email" required><br/>
                    <b>Hasło:</b><br/><br/> <input class="pole" type="password" name="haslo" required><br/><br/>
                    <br/>
                    <div id="dol">
                        <button id="logowanie" type="submit" name="next">Zaloguj</button>
                        <br/>
                        <?php 
                        if(isset($_GET['status'])){
                            if($_GET['status'] == "failed")
                                echo "<div id='komunikat'>Niepoprawna nazwa lub hasło użytkownika</div>";
                        }
                        ?>
                        <div id="link">
                            <a href="rejestracja.php">Nie masz konta?</br>Zarejestruj się</a>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</body>
</html>
<?php

?>