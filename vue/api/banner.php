<?php

try {

  //  DB接続
  $dsn = 'mysql:dbname=LAA1384402-shop; host=mysql154.phy.lolipop.lan; charset=utf8';
  $user = 'LAA1384402';
  $password = 'work';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //商品リスト取得
  $sql = 'SELECT * FROM banner WHERE is_deleted = 0';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();


  $banners = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $banners[] = array(
      'id'  => (int)$row['id'],
      'image'  => $row['image'],
      'product_id'  => (int)$row['product_id'],
    );
  }

  // 配列をJSONに変換
  $json = json_encode($banners, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

  // JSONを出力
  header("Content-Type: application/json");
  echo $json;

} catch (Exception $e) {
  exit();
}
 ?>
