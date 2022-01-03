<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>カテゴリー編集</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../../common.css">
    <link rel="stylesheet" href="../main.css">
  </head>
  <body>
    <?php include('../header.php') ?>
    <main>
      <!-- サイドナビ -->
      <?php include('./../side_navi.php') ?>
      <div id="validation" class="mainPanel">
        <form class="" action="cat_edit_check.php" method="post">
          <input type="hidden" name="id" value=<?= $_POST['id'] ?>>
          <input type="text" class="colorBlack" name="name" value=<?= $_POST['name'] ?>>
          <input type="submit" class="colorBlack" name="" value="確認画面へ">
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/admin_validation.js"></script>
