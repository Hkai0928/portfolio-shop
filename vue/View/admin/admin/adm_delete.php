<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>管理者削除確認</title>
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
        <div>この管理者を削除してもよろしいでしょうか？</div>
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
            <th>ログインID</th>
            <td><?= $_POST['loginId'] ?></td>
          </tr>
        </table>
        <form class="" action="adm_delete_done.php" method="post">
          <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
          <div><input type="submit" class="colorBlack" value="削除"></div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
