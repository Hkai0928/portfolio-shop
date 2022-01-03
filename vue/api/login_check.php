<?php

session_start();

try {
  $member_id=$_POST['id'];
  $member_pass=$_POST['pass'];

  $member_id=htmlspecialchars($member_id,ENT_QUOTES,'UTF-8');
  $member_pass=htmlspecialchars($member_pass,ENT_QUOTES,'UTF-8');

  $member_pass=md5($member_pass);

  //  DB接続
  $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //IDとPASS取得
  $sql = 'SELECT * FROM member WHERE login_id=? AND password=?';
  $stmt = $dbh->prepare($sql);
  $data[]=$member_id;
  $data[]=$member_pass;
  $stmt->execute($data);

  $dbh=null;

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);

  //  ログイン認証判別
  if($rec == false) {
    $_SESSION['error_id'] = $_POST['id'];
    $_SESSION['error'] = 1;
    header('Location: ../View/main/login.php');
    exit();
  } else {
    unset($_SESSION['error_id']);
    unset($_SESSION['error']);
    $_SESSION['login'] = 1;
    $_SESSION['code'] = $rec['id'];
    header('Location: ../View/main/top.php');
    exit();
  }


} catch (\Exception $e) {
  print 'ただいま障害中';
  exit();
}


 ?>
