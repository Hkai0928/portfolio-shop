<?php
  try {
    //  DB接続
    $dsn = 'mysql:dbname=LAA1384402-shop; host=mysql154.phy.lolipop.lan; charset=utf8';
    $user = 'LAA1384402';
    $password = 'work';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //商品削除
    $sql = 'UPDATE admin SET is_deleted=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = 1;
    $data[] = $_POST['id'];
    $stmt->execute($data);

    $dbh = null;

    header('Location: adm_delete_msg.php');
  } catch (\Exception $e) {
    header('Location: adm_error_msg.php');
    exit();
  }

 ?>
