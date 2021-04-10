<?php
class Reservation {

  private $pdo;
  private $stmt;
  public $error;

  function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
      );
    } catch (Exception $ex) { die($ex->getMessage()); }
  }

  function __destruct() {
    $this->pdo = null;
    $this->stmt = null;
  }

  function save ($date, $slot, $name, $email, $tel) {

    try {
      $this->stmt = $this->pdo->prepare(
        "INSERT INTO `reservations` (`res_date`, `res_slot`, `res_name`, `res_email`, `res_tel`) VALUES (?,?,?,?,?)"
      );
      $this->stmt->execute([$date, $slot, $name, $email, $tel]);
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }

    $subject = "Otrzymano rezerwację";
    $message = "Dziękujemy za złożenie rezerwacji";
    @mail($email, $subject, $message);
    return true;
  }
  
  function getDay ($day="") {
    if ($day=="") { $day = date("Y-m-d"); }
    
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `reservations` WHERE `res_date`=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll(PDO::FETCH_NAMED);
  }

  function res_count($date,$slot){
    $ppl=0;
    $query = $this->pdo->prepare(
      "SELECT * FROM `reservations` WHERE `res_date` like ? and `res_slot` like ?"
    );
    $query->execute([$date,$slot]);
    foreach($query as $row){
      $ppl++;
  }
  return $ppl;
  }
  function getMail($email){
    $query = $this->pdo->prepare(
      "SELECT `res_email` FROM `reservations` WHERE `res_email` like ?"
    );
    $query->execute([$email]);
    if($query->rowCount()>0){
      return false;
    }else{
        return true;
    }
  }
}


define('DB_HOST', 'localhost');
define('DB_NAME', 'szczepienia');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$_RSV = new Reservation();