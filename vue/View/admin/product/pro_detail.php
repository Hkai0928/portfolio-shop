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
        <div>商品詳細画面</div>
        <div v-for="product in resultKey">
          <table class="detailTable" border="1">
            <tr>
              <th>商品ID</th>
              <td>{{ product.id }}</td>
            </tr>
            <tr>
              <th>商品名</th>
              <td>{{ product.name }}</td>
            </tr>
            <tr>
              <th>商品画像</th>
              <td><img v-bind:src="product.image" alt=""></td>
            </tr>
            <tr>
              <th>価格</th>
              <td>{{ product.price | number_format }}</td>
            </tr>
            <tr>
              <th>送料</th>
              <td>{{ product.postage | number_format }}</td>
            </tr>
            <tr>
              <th>カテゴリー</th>
              <td>{{ product.category }}</td>
            </tr>
            <tr>
              <th>在庫</th>
              <td>{{ product.stock }}</td>
            </tr>
            <tr>
              <th>販売台数</th>
              <td>{{ product.sale }}</td>
            </tr>
          </table>
          <form method="post">
            <input type="hidden" name="id" v-bind:value="product.id">
            <input type="hidden" name="name" v-bind:value="product.name">
            <input type="hidden" name="image" v-bind:value="imageFile">
            <input type="hidden" name="price" v-bind:value="product.price">
            <input type="hidden" name="postage" v-bind:value="product.postage">
            <input type="hidden" name="category" v-bind:value="product.category">
            <input type="hidden" name="stock" v-bind:value="product.stock">
            <input type="hidden" name="sale" v-bind:value="product.sale">
            <input type="submit" class="colorBlack" value="編集" formaction="pro_edit.php">
            <input type="submit" class="colorBlack" value="削除" formaction="pro_delete.php">
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
<script src="../../../Model/admin_product_list.js"></script>
