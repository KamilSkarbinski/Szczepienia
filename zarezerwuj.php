<?php 
    if(isset($_POST['zarezerwuj'])){
    if(isset($_POST['data'])){
        $db=mysqli_connect("localhost","root","","szczepienia");
        $sql="SELECT `termin_szczepienia` from `dane_uzytkownika` where ";
        $wynik=mysqli_query($db,$sql);
        while($row=mysqli_fetch_array($wynik)){
            if($row[0]==null){

            }else{
                echo("Twoje szczepienie jest ".$row[0]);
            }
        }
        echo("Dziękujemy za złożenie rezerwacji<br><a href=\"index.php\">Strona Główna</a>");
        mysqli_close($db);
    }else{
        echo("Proszę wybrać datę<br>");
        echo("<a href=\"przydzielanie.php\">powrót</a>");
    }
    
}

?>