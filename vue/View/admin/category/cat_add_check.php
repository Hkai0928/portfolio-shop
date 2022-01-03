<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>管理者追加確認</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../../common.css">
    <link rel="stylesheet" href="../main.css">
  </head>
  <body>
    <?php include('../header.php') ?>
    <main>
      <!-- サイドナビ -->
      <?php include('./../side_navi.php') ?>
      <!-- mainPanel -->
      <div class="mainPanel">
        <div>下記カテゴリーを追加してよろしいでしょうか？。</div>
        <div>カテゴリー名</div>
        <div><?= $_POST['name'] ?></div>
        <form action="cat_add_done.php" method="post">
          <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
          <input type="hidden" name="defOrder" value=<?= $_POST['defOrder'] ?>>
          <div><input type="submit" class="colorBlack" value="追加"></div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
