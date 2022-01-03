<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>カテゴリー追加</title>
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
      <div id="validation" class="mainPanel">
        <form action="cat_add_check.php" method="post">
          <input type="hidden" name="defOrder" value=<?= $_POST['defOrder'] ?>>
          <div>カテゴリー名</div>
          <div><input type="text" class="colorBlack" name="name" v-model="name" value=""></div>
          <div>
            <input type="submit" class="colorBlack" :disabled="isBtnActive" v-bind="isActive"  value="確認画面へ">
          </div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/category_validation.js"></script>
