<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>詳細画面</title>
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
      <div id="app" class="mainPanel">
        <div>一般会員詳細画面</div>
        <div v-for="member in resultKey">
          <table border="1">
            <tr>
              <th>会員ID</th>
              <td>{{ member.id }}</td>
            </tr>
            <tr>
              <th>名前</th>
              <td>{{ member.name }}</td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td>{{ member.mail }}</td>
            </tr>
            <tr>
              <th>住所</th>
              <td>{{ member.address }}</td>
            </tr>
            <tr>
              <th>ログインID</th>
              <td>{{ member.login_id }}</td>
            </tr>
          </table>
          <form method="post">
            <input type="hidden" name="id" v-bind:value="member.id">
            <input type="hidden" name="name" v-bind:value="member.name">
            <input type="hidden" name="mail" v-bind:value="member.mail">
            <input type="hidden" name="address" v-bind:value="member.address">
            <input type="hidden" name="loginId" v-bind:value="member.login_id">
            <input type="hidden" name="password" v-bind:value="member.password">
            <input type="submit" class="colorBlack" value="編集" formaction="mem_edit.php">
            <input type="submit" class="colorBlack" value="削除" formaction="mem_delete.php">
          </form>
        </div>
      </div>
    </main>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/vuejs-paginate@2.1.0"></script>
<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/admin_member_list.js"></script>
