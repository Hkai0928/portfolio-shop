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
        <div class="contentTitle">商品一覧</div>
        <input type="button" class="colorBlack" onclick="location.href='./pro_add.php'" value="商品追加">
        <table class=listTable border="1">
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
          <tr v-for="product in getProducts" v-bind:key="product.id" @click="select(product.id)">
            <td>{{ product.id }}</td>
          <td><img v-bind:src="product.image" alt=""></td>
            <td>{{ product.name }}</td>
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
<script src="../../../Model/admin_product_list.js"></script>
