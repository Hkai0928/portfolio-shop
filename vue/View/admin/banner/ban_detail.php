<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>詳細画面</title>
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
      <div  class="mainPanel">
        <div class="contentTitle">バナー詳細</div>
        <div id="banner" class="image">
          <div v-for="banner in resultImage" class="">
            <div class="bannerImg">
              <img class="" v-bind:src="banner.image" alt="">
            </div>
          </div>
          <div v-for="product in resultPro">
            <table class="listTable" border="1">
              <tr>
                <th>商品ID</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>送料</th>
                <th>カテゴリー</th>
                <th>在庫</th>
                <th>販売台数</th>
              </tr>
              <tr>
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td class="proImg"><img v-bind:src="product.image" alt=""></td>
                <td>{{ product.price | number_format }}</td>
                <td>{{ product.postage | number_format }}</td>
                <td>
                  <div v-for="category in categorys" :key="category.id">
                    <div v-if="category.id == product.category">
                      {{ category.name }}
                    </div>
                  </div>
                </td>
                <td>{{ product.stock }}</td>
                <td>{{ product.sale }}</td>
              </tr>
            </table>
          </div>
          <form method="get">
            <input type="hidden" name="id" v-bind:value="detailId">
            <input type="submit" class="colorBlack" value="編集" formaction="ban_edit.php">
            <input type="submit" class="colorBlack" value="削除" formaction="ban_delete.php">
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
<script src="../../../Model/admin_banner_list.js"></script>
