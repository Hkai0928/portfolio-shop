<?php
  try {
    //  DB接続
    $dsn = 'mysql:dbname=LAA1384402-shop; host=mysql154.phy.lolipop.lan; charset=utf8';
    $user = 'LAA1384402';
    $password = 'work';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //  日付取得
    $date = new DateTime();

    //商品追加
    $sql = 'UPDATE category SET name=?,updated_at=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $_POST['name'];
    $data[] = $date->format('Y-m-d');
    $data[] = $_POST['id'];
    $stmt->execute($data);

    $dbh = null;

    header('Location: cat_edit_msg.php');
  } catch (\Exception $e) {
    header('Location: cat_error_msg.php');
    exit();
  }

 ?>
