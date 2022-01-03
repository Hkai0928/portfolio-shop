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
    $member_pass = $_POST['password'];
    if($member_pass == "") {
      $member_pass = $_POST['oldPassword'];
    } else {
      $member_pass = md5($member_pass);
    }

    //商品追加
    $sql = 'UPDATE member SET name=?,mail=?,address=?,login_id=?,password=?,updated_at=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $_POST['name'];
    $data[] = $_POST['mail'];
    $data[] = $_POST['address'];
    $data[] = $_POST['loginId'];
    $data[] = $member_pass;
    $data[] = $date->format('Y-m-d');
    $data[] = $_POST['id'];
    $stmt->execute($data);

    $dbh = null;

    session_start();
    $_SESSION['edit_id'] = $_POST['id'];

    header('Location: mem_edit_msg.php');
  } catch (\Exception $e) {
    header('Location: mem_error_msg.php');
    exit();
  }

 ?>
