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

    //追加
    $sql = 'INSERT INTO category(name,cat_order,created_at) VALUES (?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $_POST['name'];
    $data[] = $_POST['defOrder'];
    $data[] = $date->format('Y-m-d');
    print 'aaa';
    $stmt->execute($data);

    $dbh = null;

    header('Location: cat_add_msg.php');
  } catch (\Exception $e) {
    header('Location: cat_error_msg.php');
    exit();
  }


 ?>
