<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>会員情報</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="user.css">
  </head>
  <body>
    <?php include('./header.php') ?>
    <main id="app">
      <div v-for="member in members">
        <div class="contentTitle">会員情報</div>
        <div class="infoArea">
          <div class="infoRow">
            <div>会員ID</div>
            <div>{{ member.id }}</div>
          </div>
          <div class="infoRow">
            <div>名前</div>
            <div>{{ member.name }}</div>
          </div>
          <div class="infoRow">
            <div>メールアドレス</div>
            <div>{{ member.mail }}</div>
          </div>
          <div class="infoRow">
            <div>住所</div>
            <div>{{ member.address }}</div>
          </div>
          <div class="infoRow">
            <div>ログインID</div>
            <div>{{ member.login_id }}</div>
          </div>
        </div>
        <form method="post">
          <input type="hidden" name="id" v-bind:value="member.id">
          <input type="hidden" name="name" v-bind:value="member.name">
          <input type="hidden" name="mail" v-bind:value="member.mail">
          <input type="hidden" name="address" v-bind:value="member.address">
          <input type="hidden" name="loginId" v-bind:value="member.login_id">
          <input type="hidden" name="password" v-bind:value="member.password">
          <input type="submit" class="colorBlack" value="編集" formaction="user_edit.php">
        </form>
      </div>
    </main>
    <footer></footer>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/user.js"></script>
