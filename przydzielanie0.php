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
    <form method="POST" action="">
    <?php
        if(isset($_POST['wybierz'])){
            $mi=$_POST['miesiac'];
            $db=mysqli_connect("localhost","root","","szczepienia");
            $sql="SELECT dzien,godzina,miesiac,zajety from `dostepne_terminy` where miesiac= $mi and zajety = 0";
            $wynik=mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($wynik)){
                echo("<input type=\"checkbox\" value=\"".$row['dzien']."\">".$row['dzien']." ".$row['godzina']."<br>");
            }
            
            mysqli_close($db);
        }
        
    ?>
</body>
</html>
