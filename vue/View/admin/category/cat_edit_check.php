<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>カテゴリー編集確認</title>
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
        <div>下記内容で編集してよろしいでしょうか？</div>
        <div>カテゴリー名</div>
        <div><?= $_POST['name'] ?></div>
        <form class="" action="cat_edit_done.php" method="post">
          <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
          <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
          <div><input type="submit" class="colorBlack" value="編集完了"></div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
