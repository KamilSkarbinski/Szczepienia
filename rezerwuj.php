<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style3.css">
  <title>Rezerwacja</title>
  <link rel="shortcut icon" href="syringe.png">
</head>
<body>
  <div id="menu">
      <ul class="menu">
          <li><a href="index.php">Strona główna</a></li>
          <li><a href="wyloguj.php">Wyloguj</a></li>
          <div id="menu_right">
              <li id="login"><a href="szczegoly_konta.php"><img src="avatar.png" alt="Avatar" class="avatar"></a></li>
          </div>
      </ul>
  </div>  
  <?php

  if (isset($_POST['date'])) {
    require "rezerwacja.php";
     if($_RSV->res_count($_POST['date'], $_POST['slot'])<15){
       if($_RSV->getMail($_POST['email'])){
        if ($_RSV->save(
          $_POST['date'], $_POST['slot'], $_POST['name'],
          $_POST['email'], $_POST['tel'])) {
           echo "<div class='ok'>Rezerwacja złożona</div>";
        } else { echo "<div class='err'>".$RESERVE->error."</div>"; }
       }else{
        echo "<div class='reserved'>Na ten adres e-mail złożono już rezerwację</div>";
       }
     }else{echo "<div class='full'>Termin zajęty</div>";}
  }
  ?>
  
  <h1>REZERWACJA</h1>
  <form id="resForm" method="post" target="_self">
    <label for="res_name">Imie i nazwisko</label>
    <input type="text" required name="name" value=""/>
    <label for="res_email">Email</label>
    <input type="email" required name="email" value=""/>
    <label for="res_tel">Numer telefonu</label>
    <input type="text" required name="tel" value=""/>
    <label>Data</label>
    <input type="date" required id="res_date" name="date" value="<?=date("Y-m-d")?>">
    <label>Godzina</label>
    <select name="slot">
      <option value="8-10">8-10</option>
      <option value="10-12">10-12</option>
      <option value="12-14">12-14</option>
      <option value="14-16">14-16</option>
    </select>
    <input type="submit" value="Zatwierdz termin"/>
  </form>
</body>
</html>