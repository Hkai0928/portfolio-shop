<?php

session_start();

try {
  $admin_id=$_POST['id'];
  $admin_pass=$_POST['pass'];

  $admin_id=htmlspecialchars($admin_id,ENT_QUOTES,'UTF-8');
  $admin_pass=htmlspecialchars($admin_pass,ENT_QUOTES,'UTF-8');

  $admin_pass=md5($admin_pass);

  //  DB接続
  $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //IDとPASS取得
  $sql = 'SELECT * FROM admin WHERE login_id=? AND password=?';
  $stmt = $dbh->prepare($sql);
  $data[]=$admin_id;
  $data[]=$admin_pass;
  $stmt->execute($data);

  $dbh=null;

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);

  //  ログイン認証判別
  if($rec == false) {
    $_SESSION['error_id'] = $_POST['id'];
    $_SESSION['error'] = 1;
    header('Location: ../View/admin/login.php');
    exit();
  } else {
    unset($_SESSION['error_id']);
    unset($_SESSION['error']);
    $_SESSION['admin_login'] = 1;
    $_SESSION['id'] = $rec['id'];
    $_SESSION['name'] = $rec['name'];
    header('Location: ../View/admin/main.php');
    exit();
  }


} catch (\Exception $e) {
  print 'ただいま障害中';
  exit();
}


 ?>
