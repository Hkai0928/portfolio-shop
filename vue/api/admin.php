<?php

try {

  //  DB接続
  $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //商品リスト取得
  $sql = 'SELECT * FROM admin WHERE is_deleted = 0';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();


  $admins = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $admins[] = array(
      'id' => (int)$row['id'],
      'name' => $row['name'],
      'mail' => $row['mail'],
      'login_id' => $row['login_id'],
      'password' => $row['password']
    );
  }

  // 配列をJSONに変換
  $json = json_encode($admins, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

  // JSONを出力
  header("Content-Type: application/json");
  echo $json;


} catch (Exception $e) {
  exit();
}
 ?>
