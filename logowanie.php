<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleform.css">
    <title>Logowanie użytkownika</title>
</head>
<body>
    <div id="container">
        <div id="logowanie">
            <div id="form">
                <form action="index.php" method="POST">
                    <b>Email:</b><br/><br/> <input class="pole" type="text" name="email" required><br/>
                    <b>Hasło:</b><br/><br/> <input class="pole" type="password" name="haslo" required><br/><br/>
                    <br/>
                    <div id="dol">
                        <input id="logowanie" type="submit" name="next" value="Zaloguj">
                        <br/>
                        <?php 
                        if(isset($_GET['status'])){
                            if($_GET['status'] == "failed")
                                echo "Niepoprawna nazwa lub hasło użytkownika";
                        }
                        ?>
                        <div id="link2">
                            <a href="dodawaniedobazy.php">Nie masz konta? Zarejestruj się</a>
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