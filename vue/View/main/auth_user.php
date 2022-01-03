<?php
if(!isset($_SESSION)){
  session_start();
}
if(isset($_SESSION['login']) == false) {
  $_SESSION['error'] = 2;
  header('Location: ./login.php');
}

?>
