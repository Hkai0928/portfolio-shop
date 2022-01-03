<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>商品一覧</title>
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
        <input type="button" class="colorBlack" onclick="location.href='./mem_add.php'" value="会員追加">
        <table class=listTable border="1">
          <tr>
            <th>メンバーID</th>
            <th>名前</th>
            <th>メールアドレス</th>
          </tr>
          <tr v-for="member in getMembers" v-bind:key="member.id" @click="select(member.id)">
            <td>{{ member.id }}</td>
            <td>{{ member.name }}</td>
            <td>{{ member.mail }}</td>
          </tr>
        </table>
        <paginate
          :page-count="getPageCount"
          :page-range="3"
          :margin-pages="2"
          :click-handler="clickCallback"
          :prev-text="'＜'"
          :next-text="'＞'"
          :container-class="'pagination'"
          :page-class="'page-item'">
        </paginate>
      </div>
    </main>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/vuejs-paginate@2.1.0"></script>
<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/admin_member_list.js"></script>
