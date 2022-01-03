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

    //  パスワードをMD5変換
    $member_pass = $_POST['password'];
    $member_pass = md5($member_pass);


    //追加
    $sql = 'INSERT INTO member(name,mail,address,login_id,password,created_at) VALUES (?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $_POST['name'];
    $data[] = $_POST['mail'];
    $data[] = $_POST['address'];
    $data[] = $_POST['loginId'];
    $data[] = $member_pass;
    $data[] = $date->format('Y-m-d');
    $stmt->execute($data);

    $dbh = null;

    header('Location: mem_add_msg.php');
  } catch (\Exception $e) {
    header('Location: mem_error_msg.php');
    exit();
  }


 ?>
