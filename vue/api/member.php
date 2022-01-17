<?php

try {

  //  DB接続
  $dsn = 'mysql:dbname=LAA1384402-shop; host=mysql154.phy.lolipop.lan; charset=utf8';
  $user = 'LAA1384402';
  $password = 'work';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //商品リスト取得
  $sql = 'SELECT * FROM member WHERE is_deleted = 0';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();


  $members = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $members[] = array(
      'id'  => (int)$row['id'],
      'name'  => $row['name'],
      'mail'  => $row['mail'],
      'address'  => $row['address'],
      'login_id'  => $row['login_id'],
      'password'  => $row['password']
    );
  }

  // 配列をJSONに変換
  $json = json_encode($members, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

  // JSONを出力
  header("Content-Type: application/json");
  echo $json;

  // file_put_contents("members.json" , $json);

} catch (Exception $e) {
  exit();
}
 ?>
