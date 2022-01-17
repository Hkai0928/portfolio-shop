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

    $image = $_POST['image'];
    //  画像に変更がないときに元のファイル名で再登録し、変更があった場合はファイルを新規登録する
    if($_POST['image'] == "") {
      $image = $_POST['oldImage'];
    } else {
      rename("../../../assets/temp_product/".$_POST['image'],"../../../assets/product/".$_POST['image']);
    }

    //商品追加
    $sql = 'UPDATE product SET name=?,image=?,price=?,postage=?,category=?,stock=?,updated_at=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $_POST['name'];
    $data[] = $image;
    $data[] = $_POST['price'];
    $data[] = $_POST['postage'];
    $data[] = $_POST['category'];
    $data[] = $_POST['stock'];
    $data[] = $date->format('Y-m-d');
    $data[] = $_POST['id'];
    $stmt->execute($data);

    $dbh = null;

    session_start();
    $_SESSION['edit_id'] = $_POST['id'];

    header('Location: pro_edit_msg.php');
  } catch (\Exception $e) {
    header('Location: pro_error_msg.php');
    exit();
  }

 ?>
