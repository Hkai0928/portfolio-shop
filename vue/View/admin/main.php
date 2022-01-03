<?php
session_start();
if(isset($_SESSION['admin_login']) == false) {
  $_SESSION['error'] = 2;
  header('Location: ./login.php');
}
?>


<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>管理画面</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <?php include('./header.php') ?>
    <main>
      <!-- サイドナビ -->
      <?php include('./side_navi.php') ?>
    </main>
  </body>
</html>

<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/side_navi.js"></script>
