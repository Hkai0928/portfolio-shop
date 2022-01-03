<?php include('./auth_user.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>一般会員情報編集</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="user.css">
  </head>
  <body>
    <?php include('./header.php') ?>
    <main>
      <div id="validation" class="mainPanel">
        <form class="" action="user_edit_done.php" method="post">
          <input type="hidden" name="id" value=<?= $_POST['id'] ?>>
          <input type="hidden" name="oldPassword" value=<?= $_POST['password'] ?>>
          <div v-if="validMail"class="errorMsg">メールアドレスを正しく入力してください。</div>
          <div v-if="validLoginId"class="errorMsg">ログインIDは半角英数字のみで入力してください。</div>
          <div v-if="validPass"class="errorMsg">
            パスワード（確認）がパスワードと一致しません。入力しなおしてください。
          </div>
          <div class="contentTitle">会員情報</div>
          <div class="infoArea">
            <div class="infoRow">
              <div>名前</div>
              <div>
                <input type="text" id="name" class="colorBlack" name="name" v-model="name" value=<?= $_POST['name'] ?>>
              </div>
            </div>
            <div class="infoRow">
              <div>メールアドレス</div>
              <div>
                <input type="text" id="mail" class="colorBlack" name="mail" v-model="mail" value=<?= $_POST['mail'] ?>>
              </div>
            </div>
            <div class="infoRow">
              <div>住所</div>
              <div>
                <input type="text" id="address" class="colorBlack" name="address" v-model="address" value=<?= $_POST['address'] ?>>
              </div>
            </div>
            <div class="infoRow">
              <div>ログインID</div>
              <div>
                <input type="text" id="loginId" class="colorBlack" name="loginId" v-model="loginId" value=<?= $_POST['loginId'] ?>>
              </div>
            </div>
            <div class="infoRow">
              <div>パスワード</div>
              <div>
                <input type="password" class="colorBlack" name="password" v-model="password" value="">
              </div>
            </div>
            <div class="infoRow">
              <div>パスワード（確認用）</div>
              <div>
                <input type="password" class="colorBlack" name="password2" v-model="password2" value="">
              </div>
            </div>
          </div>
          <input type="submit" class="colorBlack" name="" :disabled="isBtnActive" v-bind="isActive" value="この内容で登録する">
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/member_validation.js"></script>
