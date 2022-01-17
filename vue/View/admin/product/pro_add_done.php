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
    $sql = 'INSERT INTO product(name,image,price,postage,category,stock,created_at) VALUES (?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $_POST['name'];
    $data[] = $_POST['image'];
    $data[] = $_POST['price'];
    $data[] = $_POST['postage'];
    $data[] = $_POST['category'];
    $data[] = $_POST['stock'];
    $data[] = $date->format('Y-m-d');
    $stmt->execute($data);

    $dbh = null;
    rename("../../../assets/temp_product/".$_POST['image'],"../../../assets/product/".$_POST['image']);

    header('Location: pro_add_msg.php');
  } catch (\Exception $e) {
    header('Location: pro_error_msg.php');
    exit();
  }


 ?>
