<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>一般会員情報編集</title>
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
        <form class="" action="mem_edit_check.php" method="post">
          <input type="hidden" name="id" value=<?= $_POST['id'] ?>>
          <input type="hidden" name="oldPassword" value=<?= $_POST['password'] ?>>
          <div v-if="validMail"class="errorMsg">メールアドレスを正しく入力してください。</div>
          <div v-if="validLoginId"class="errorMsg">ログインIDは半角英数字のみで入力してください。</div>
          <div v-if="validPass"class="errorMsg">
            パスワード（確認）がパスワードと一致しません。入力しなおしてください。
          </div>
          <table border="1">
            <tr>
              <th>名前</th>
              <td>
                <input type="text" id="name" class="colorBlack" name="name" v-model="name" value=<?= $_POST['name'] ?>>
              </td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td>
                <input type="text" id="mail" class="colorBlack" name="mail" v-model="mail" value=<?= $_POST['mail'] ?>>
              </td>
            </tr>
            <tr>
              <th>住所</th>
              <td>
                <input type="text" id="address" class="colorBlack" name="address" v-model="address" value=<?= $_POST['address'] ?>>
              </td>
            </tr>
            <tr>
              <th>ログインID</th>
              <td>
                <input type="text" id="loginId" class="colorBlack" name="loginId" v-model="loginId" value=<?= $_POST['loginId'] ?>>
              </td>
            </tr>
            <tr>
              <th>パスワード</th>
              <td>
                <input type="password" class="colorBlack" name="password" v-model="password" value="">
              </td>
            </tr>
            <tr>
              <th>パスワード（確認用）</th>
              <td>
                <input type="password" class="colorBlack" name="password2" v-model="password2" value="">
              </td>
            </tr>
          </table>
          <input type="submit" class="colorBlack" name="" :disabled="isBtnActive" v-bind="isActive" value="確認画面へ">
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/member_validation.js"></script>
