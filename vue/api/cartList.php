<?php
session_start();

try {

  //  DB接続
  $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //商品リスト取得
  $sql = 'SELECT
      product.id,
      name,
      image,
      price,
      postage,
      stock,
      user_id,
      product_id,
      cart.is_deleted AS cart_deleted
    FROM product INNER JOIN cart ON product.id = cart.product_id
    WHERE user_id = ? AND cart.is_deleted = 0;';
  $stmt = $dbh->prepare($sql);
  $data[] = $_SESSION['code'];
  $stmt->execute($data);



  $carts = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $carts[] = array(
      'id'  => (int)$row['product_id'],
      'name'  => $row['name'],
      'image'  => $row['image'],
      'price'  => (int)$row['price'],
      'postage'  => (int)$row['postage'],
      'stock' => (int)$row['stock']
    );
  }


  // 配列をJSONに変換
  $json = json_encode($carts, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

  // JSONを出力
  header("Content-Type: application/json");
  echo $json;

  // file_put_contents("products.json" , $json);

} catch (Exception $e) {
  print "error";
  exit();
}
 ?>
