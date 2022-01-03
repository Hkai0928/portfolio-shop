<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>一般会員追加</title>
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
        <form action="mem_add_check.php" method="post">
          <div v-if="validMail"class="errorMsg">メールアドレスを正しく入力してください。</div>
          <div v-if="validLoginId"class="errorMsg">ログインIDは半角英数字のみで入力してください。</div>
          <div v-if="validPass"class="errorMsg">
            パスワード（確認）がパスワードと一致しません。入力しなおしてください。
          </div>
          <table border="1">
            <tr>
              <th>名前</th>
              <td>
                <input type="text" class="colorBlack" name="name" v-model="name" value="">
              </td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td>
                <input type="text" class="colorBlack" name="mail" v-model="mail" value="">
              </td>
            </tr>
            <tr>
              <th>住所</th>
              <td>
                <input type="text" class="colorBlack" name="address" v-model="address" value="">
              </td>
            </tr>
            <tr>
              <th>ログインID</th>
              <td>
                <input type="text" class="colorBlack" name="loginId" v-model="loginId" value="">
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
<script src="../../../Model/member_validation.js"></script>
