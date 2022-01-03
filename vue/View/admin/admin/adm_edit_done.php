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

    //  パスワードの変更があるか判別
    $admin_pass = $_POST['password'];
    if($admin_pass == "") {
      $admin_pass = $_POST['oldPassword'];
    } else {
      $admin_pass = md5($admin_pass);
    }

    //商品追加
    $sql = 'UPDATE admin SET name=?,mail=?,login_id=?,password=?,updated_at=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $_POST['name'];
    $data[] = $_POST['mail'];
    $data[] = $_POST['loginId'];
    $data[] = $admin_pass;
    $data[] = $date->format('Y-m-d');
    $data[] = $_POST['id'];
    $stmt->execute($data);

    $dbh = null;

    session_start();
    $_SESSION['edit_id'] = $_POST['id'];

    header('Location: adm_edit_msg.php');
  } catch (\Exception $e) {
    header('Location: adm_error_msg.php');
    exit();
  }

 ?>
