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

    //  パスワードをMD5変換
    $member_pass = $_POST['password'];
    $member_pass = md5($member_pass);


    //追加
    $sql = 'INSERT INTO admin(name,mail,login_id,password,created_at) VALUES (?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $_POST['name'];
    $data[] = $_POST['mail'];
    $data[] = $_POST['loginId'];
    $data[] = $member_pass;
    $data[] = $date->format('Y-m-d');
    $stmt->execute($data);

    $dbh = null;

    header('Location: adm_add_msg.php');
  } catch (\Exception $e) {
    header('Location: adm_error_msg.php');
    exit();
  }


 ?>
