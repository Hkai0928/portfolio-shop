<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>商品削除確認</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../../common.css">
    <link rel="stylesheet" href="../main.css">
  </head>
  <body>
    <?php include('../header.php') ?>
    <main>
      <!-- サイドナビ -->
      <?php include('./../side_navi.php') ?>
      <div class="mainPanel">
        <div>この内容の商品を削除してもよろしいでしょうか？</div>
        <table border="1">
          <tr>
            <th>商品名</th>
            <td><?= $_POST['name'] ?></td>
          </tr>
          <tr>
            <th>商品画像</th>
            <td><img src="<?= $_POST['image'] ?>" alt=""></td>
          </tr>
          <tr>
            <th>価格</th>
            <td><?= $_POST['price'] ?></td>
          </tr>
          <tr>
            <th>送料</th>
            <td><?= $_POST['postage'] ?></td>
          </tr>
          <tr>
            <th>カテゴリー</th>
            <td><?= $_POST['category'] ?></td>
          </tr>
          <tr>
            <th>在庫</th>
            <td><?= $_POST['stock'] ?></td>
          </tr>
        </table>
        <form class="" action="pro_delete_done.php" method="post">
          <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
          <div><input type="submit" class="colorBlack" value="削除"></div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
