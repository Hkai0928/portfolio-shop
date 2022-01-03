<?php
  try {
    //  DB接続
    $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
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
