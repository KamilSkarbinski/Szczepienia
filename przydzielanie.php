<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczepinia</title>
    <lnik rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="">
        <div>Wybierz miesiąc</div>
        <select name="miesiac">
            <option value="1">Styczeń</option>
            <option value="2">Luty</option>
            <option value="3">Marzec</option>
            <option value="4">Kwiecień</option>
            <option value="5">Maj</option>
            <option value="6">Czerwiec</option>
            <option value="7">Lipiec</option>
            <option value="8">Sierpień</option>
            <option value="9">Wrzesień</option>
            <option value="10">Październik</option>
            <option value="11">Listopad</option>
            <option value="12">Grudzień</option>
        </select>
        <input type="submit" name="wybierz" value="Wybierz">
    </form>
    <form method="POST" action="zarezerwuj.php">
    <?php
        if(isset($_POST['wybierz'])){
            echo("<div>Wybierz dzień szczepienia</div>");
            $mi=$_POST['miesiac'];
            $db=mysqli_connect("localhost","root","","szczepienia");
            $sql="SELECT dzien,godzina,miesiac,zajety from `dostepne_terminy` where miesiac= $mi and zajety = 0";
            $wynik=mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($wynik)){
                echo("<input type=\"checkbox\" name=\"data\" value=\"0".$row['dzien']." 0".$mi." ".$row['godzina']."\">".$row['dzien']." ".$row['godzina']."<br>");
            }
            echo("<input type=\"submit\" name =\"zarezerwuj\" value=\"zarezerwuj\">");
            mysqli_close($db);
        }
    ?>
    </form>
</body>
</html>