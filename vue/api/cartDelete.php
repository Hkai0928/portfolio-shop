<?php
session_start();
  try {
    //  DB接続
    $dsn = 'mysql:dbname=LAA1384402-shop; host=mysql154.phy.lolipop.lan; charset=utf8';
    $user = 'LAA1384402';
    $password = 'work';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //  日付取得
    $date = new DateTime();

    //削除
    $sql = 'UPDATE cart SET is_deleted=?,updated_at=? WHERE user_id = ? AND product_id=? AND is_deleted = 0';
    $stmt = $dbh->prepare($sql);
    $data[] = 1;
    $data[] = $date->format('Y-m-d');
    $data[] = $_SESSION['code'];
    $data[] = $_POST['product_id'];
    $stmt->execute($data);

    $dbh = null;

    header('Location: ../View/main/cart.php');
  } catch (\Exception $e) {
    exit();
  }


 ?>
