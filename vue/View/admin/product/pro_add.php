<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>商品追加</title>
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
        <form action="pro_add_check.php" method="post" enctype="multipart/form-data">
          <div v-if="validPrice"class="errorMsg">価格は半角数字で入力してください。</div>
          <div v-if="validPostage"class="errorMsg">送料は半角数字で入力してください。</div>
          <div v-if="validStock"class="errorMsg">在庫は半角数字で入力してください。</div>
          <table border="1">
            <tr>
              <th>商品名</th>
              <td>
                <input type="text" class="colorBlack" name="name" v-model="name" value="">
              </td>
            </tr>
            <tr>
              <th>商品画像</th>
              <td>
                <input type="file" name="image">
              </td>
            </tr>
            <tr>
              <th>価格</th>
              <td>
                <input type="text" class="colorBlack" name="price" v-model="price" value="">
              </td>
            </tr>
            <tr>
              <th>送料</th>
              <td>
                <input type="text" class="colorBlack" name="postage" v-model="postage" value="">
              </td>
            </tr>
            <tr>
              <th>カテゴリー</th>
              <td>
                <div>
                  <select  class="colorBlack" name="cat_id" v-model="category">
                    <option value='0'>選択してください</option>
                    <option v-for="category in categorys" v-bind:value="category.id">
                      {{ category.name }}
                    </option>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <th>在庫</th>
              <td>
                <input type="text" class="colorBlack" name="stock" v-model="stock" value="">
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/product_validation.js"></script>
