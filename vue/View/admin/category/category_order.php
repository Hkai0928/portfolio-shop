<?php
try {

  //  DB接続
  $dsn = 'mysql:dbname=LAA1384402-shop; host=mysql154.phy.lolipop.lan; charset=utf8';
  $user = 'LAA1384402';
  $password = 'work';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $orderId = explode(",", $_POST['orderId']);

  //  順番変更
  for($i=0; $i<count($orderId); $i++) {
    print 'order:';
    print $i+1;
    print '</br>';
    print 'id:';
    print $orderId[$i];
    print '</br>';
    $sql = 'UPDATE category SET cat_order=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $i+1;
    $data[] = $orderId[$i];
    $stmt->execute($data);
    $data = array();
  }

  $dbh = null;

  header('Location: cat_list.php');
} catch (\Exception $e) {
  header('Location: cat_error_msg.php');
  print "error";
  exit();
}

 ?>
