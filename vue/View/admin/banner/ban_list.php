<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>バナー一覧</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../../common.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="./banner.css">
  </head>
  <body>
    <?php include('../header.php') ?>
    <main>
      <!-- サイドナビ -->
      <?php include('./../side_navi.php') ?>
      <!-- mainPanel -->
      <div id="banner" class="mainPanel">
        <div class="contentTitle">バナー一覧</div>
        <input type="button" class="colorBlack" onclick="location.href='./ban_add.php'" value="バナー追加">
        <div v-for="banner in banners" class="">
          <div class="bannerImg bannerList click">
            <img class="" v-bind:src="banner.image" alt="" @click="select(banner.id)">
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/vuejs-paginate@2.1.0"></script>
<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/admin_banner_list.js"></script>
