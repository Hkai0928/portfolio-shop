<?php

try {

  //  DB接続
  $dsn = 'mysql:dbname=LAA1384402-shop; host=mysql154.phy.lolipop.lan; charset=utf8';
  $user = 'LAA1384402';
  $password = 'work';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //商品リスト取得
  $sql = 'SELECT * FROM product WHERE is_deleted = 0';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();


  $products = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $products[] = array(
      'id'  => (int)$row['id'],
      'name'  => $row['name'],
      'image'  => $row['image'],
      'price'  => (int)$row['price'],
      'postage'  => (int)$row['postage'],
      'category'  => $row['category'],
      'stock'  => (int)$row['stock'],
      'sale'  => (int)$row['sale']
    );
  }

  // 配列をJSONに変換
  $json = json_encode($products, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

  // JSONを出力
  header("Content-Type: application/json");
  echo $json;

  // file_put_contents("products.json" , $json);

} catch (Exception $e) {
  exit();
}
 ?>
