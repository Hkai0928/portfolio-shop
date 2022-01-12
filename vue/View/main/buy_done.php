<?php
session_start();

  try {

    //  DB接続
    $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //商品の在庫と売上更新
    $sql = 'UPDATE product a INNER JOIN cart b
            ON a.id = b.product_id
            SET a.stock = a.stock - 1 ,
                a.sale = a.sale + 1
            WHERE user_id = ?';
    $stmt = $dbh->prepare($sql);
    $data[] = $_SESSION['code'];
    $stmt->execute($data);


    //  カートの中身削除
    $sql2 = 'UPDATE cart a INNER JOIN product b ON a.product_id = b.id
            SET a.is_deleted = 1
            WHERE user_id = ?';
    $stmt2 = $dbh->prepare($sql2);
    $data2[] = $_SESSION['code'];
    $stmt2->execute($data2);


    $dbh = null;

      header('Location: buy_msg.php');
  } catch (\Exception $e) {
    // header('Location: error_msg.php');
    exit();
  }

 ?>
