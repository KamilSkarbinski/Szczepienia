<?php
// (A) PROCESS RESERVATION
if (isset($_POST['date'])) {
  require "rezerwacja.php";
  if ($_RSV->save(
    $_POST['date'], $_POST['slot'], $_POST['name'],
    $_POST['email'], $_POST['tel'], $_POST['notes'])) {
     echo "<div class='ok'>Reservation saved.</div>";
  } else { echo "<div class='err'>".$RESERVE->error."</div>"; }
}
?>

<!-- (B) RESERVATION FORM -->
<h1>RESERVATION</h1>
<form id="resForm" method="post" target="_self">
  <label for="res_name">Name</label>
  <input type="text" required name="name" value=""/>
  <label for="res_email">Email</label>
  <input type="email" required name="email" value=""/>
  <label for="res_tel">Telephone Number</label>
  <input type="text" required name="tel" value=""/>
  <label for="res_notes">Notes (if any)</label>
  <input type="text" name="notes" value="Testing"/>
  <label>Reservation Date</label>
  <input type="date" required id="res_date" name="date" value="<?=date("Y-m-d")?>">
  <label>Reservation Slot</label>
  <select name="slot">
    <option value="AM">AM</option>
    <option value="PM">PM</option>
  </select>
  <input type="submit" value="Submit"/>
</form>