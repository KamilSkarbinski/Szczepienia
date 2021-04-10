<?php

    session_start();
    $_POST['login'] = $_SESSION['email'];
    if(isset($_POST['anuluj'])){
        $base = mysqli_connect("127.0.0.1", "root", "", "szczepienia");
        $sql = "DELETE FROM reservations WHERE `res_email` = '$_SESSION[email]'";
        mysqli_query($base, $sql);
        header("location: szczegoly_konta.php");
    }

?>