<?php
session_start();
  try {
    //  DB接続
    $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //  日付取得
    $date = new DateTime();

    //追加
    $sql = 'INSERT INTO cart(user_id,product_id,created_at) VALUES (?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $_SESSION['code'];
    $data[] = $_POST['product_id'];
    $data[] = $date->format('Y-m-d');
    $stmt->execute($data);

    $dbh = null;

    header('Location: ../View/main/cart_add.php?product='.$_POST['product_id']);
  } catch (\Exception $e) {

    exit();
  }


 ?>
