<?php
session_start();
if(isset($_SESSION['admin_login']) == false) {
  $_SESSION['error'] = 2;
  header('Location: ../login.php');
}

?>
