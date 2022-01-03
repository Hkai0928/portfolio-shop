<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>カテゴリー削除確認</title>
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
        <div>このカテゴリーを削除してもよろしいでしょうか？</div>
        <div>カテゴリー名</div>
        <div><?= $_POST['name'] ?></div>
        <form class="" action="cat_delete_done.php" method="post">
          <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
          <div><input type="submit" class="colorBlack" value="削除"></div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
