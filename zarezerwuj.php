<?php 
    session_start();
    if(isset($_POST['zarezerwuj'])){
    if(isset($_POST['data'])){
        $data=explode(",",$_POST['data'])[1];
        $id=explode(",",$_POST['data'])[0];
        $login=$_SESSION['email'];
        echo($login." data ".$data."<br>");

        $db=mysqli_connect("localhost","root","","szczepienia");
        $sql="SELECT `termin_szczepienia` from `dane_uzytkownika` where email like '$login'";
        $wynik=mysqli_query($db,$sql);

        while($row=mysqli_fetch_array($wynik)){
            if($row[0]==null){
                $sql="UPDATE `dane_uzytkownika` set `termin_szczepienia`='$data' where email like '$login'";
                mysqli_query($db,$sql);
                $sql="UPDATE `dostepne_terminy` set `zajety`=1 where id like '$id'";
                mysqli_query($db,$sql);
                echo("Dziękujemy za złożenie rezerwacji<br><a href=\"index.php\">Strona Główna</a>");
                mysqli_close($db);
            }else{
                echo("Twoje szczepienie jest ".$row[0]);
                echo("<br><a href=\"index.php\">Strona Główna</a>");
            }
        }
        
    }else{
        echo("Proszę wybrać datę<br>");
        echo("<a href=\"przydzielanie.php\">powrót</a>");
        echo("<br><a href=\"index.php\">Strona Główna</a>");
    }
    
}
?>