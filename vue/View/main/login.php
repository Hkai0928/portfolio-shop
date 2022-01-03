<?php
session_start();

//  ログイン失敗時の入力されたID取得
if(isset($_SESSION['error_id'])) {
  $error_id = $_SESSION['error_id'];
} else {
  $error_id = "";
}
//  ログイン失敗時のエラーメッセージ
$error_msg = "";
if(isset($_SESSION['error']) && $_SESSION['error'] == 1) {
  $error_msg = "<div class='errorMsg'>ログインIDかパスワードが間違っています。</div>";
}

 ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <header id="header">
      <div class="title">長谷川ポートフォリオ</div>
    </header>
    <main>
      <?= $error_msg ?>
      <div class="loginTitle">ログイン<div>
      <form action="../../api/login_check.php" method="post">
        <div>ログインID</div>
        <div><input type="text" name="id" value="<?= $error_id ?>"></div>
        <div>パスワード</div>
        <div><input type="password" name="pass"></div>
        <div><input type="submit" value="ログイン"></div>
      </form>
    </main>
  </body>
</html>
