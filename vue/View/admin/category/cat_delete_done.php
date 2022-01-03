<?php
  try {
    //  DB接続
    $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //カテゴリー削除
    $sql = 'UPDATE category SET is_deleted=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = 1;
    $data[] = $_POST['id'];
    $stmt->execute($data);

    //商品テーブルのカテゴリー削除
    $sql1 = 'UPDATE product SET category=? WHERE category=?';
    $stmt1 = $dbh->prepare($sql1);
    $data1[] = "";
    $data1[] = $_POST['id'];
    $stmt1->execute($data1);

    $dbh = null;

    header('Location: cat_delete_msg.php');
  } catch (\Exception $e) {
    header('Location: cat_error_msg.php');
    exit();
  }

 ?>
