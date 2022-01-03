<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>バナー編集</title>
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
        <form action="ban_edit_done.php" method="post" enctype="multipart/form-data">
          <div class="content">
            <div>バナー画像を選択してください。</div>
            <input type="file" name="image" ref="preview" @change="uploadFile">
            <div>※900×350推奨</div>
            <div class="bannerImg" v-if="imageUrl">
              <img :src="imageUrl">
            </div>
          </div>
          <div class="content">
            <div>バナー画像のリンク先商品を選択してください。</div>
            <table class=listTable border="1">
              <tr>
                <th>選択</th>
                <th>商品ID</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>送料</th>
                <th>カテゴリー</th>
                <th>在庫</th>
                <th>販売台数</th>
              </tr>
              <tr v-for="product in getProducts" v-bind:key="product.id">
                <td><input type="radio" id="list" name="product_id" v-model="checkedRadio" v-bind:value="product.id"></td>
                <td>{{ product.id }}</td>
                <td class="tableImg"><img v-bind:src="product.image" alt=""></td>
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
            <div>
              <input type="hidden" name="id" value=<?= $_GET["id"] ?>">
              <input type="submit" class="colorBlack" value="編集完了">
            </div>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/vuejs-paginate@2.1.0"></script>
<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/admin_banner_list.js"></script>
