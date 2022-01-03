<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>商品追加</title>
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
        <div>下記内容で会員を追加してよろしいでしょうか？。</div>
        <table border="1">
          <tr>
            <th>名前</th>
            <td><?= $_POST['name'] ?></td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td><?= $_POST['mail'] ?></td>
          </tr>
          <tr>
            <th>住所</th>
            <td><?= $_POST['address'] ?></td>
          </tr>
          <tr>
            <th>ログインID</th>
            <td><?= $_POST['loginId'] ?></td>
          </tr>
        </table>
        <form action="mem_add_done.php" method="post">
          <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
          <input type="hidden" name="mail" value="<?= $_POST['mail'] ?>">
          <input type="hidden" name="address" value="<?= $_POST['address'] ?>">
          <input type="hidden" name="loginId" value="<?= $_POST['loginId'] ?>">
          <input type="hidden" name="password" value="<?= $_POST['password'] ?>">
          <div><input type="submit" class="colorBlack" value="追加"></div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
