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

    //  画像ファイルがあったとき
    if(!empty($_FILES)){

      //$_FILESからファイル名を取得する
      $filename = $_FILES['image']['name'];

      //$_FILESから保存先を取得してフォルダに移す
      $uploaded_path = '../../../assets/banner/'.$filename;
      move_uploaded_file($_FILES['image']['tmp_name'],$uploaded_path);
    }

    //商品追加
    $sql = 'INSERT INTO banner(image,product_id,created_at) VALUES (?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $filename;
    $data[] = $_POST['product_id'];
    $data[] = $date->format('Y-m-d');
    $stmt->execute($data);

    $dbh = null;

    header('Location: ban_list.php');
  } catch (\Exception $e) {
    header('Location: ban_error_msg.php');
    exit();
  }


 ?>
