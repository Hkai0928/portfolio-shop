<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>商品編集</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../../common.css">
    <link rel="stylesheet" href="../main.css">
  </head>
  <body>
    <?php include('../header.php') ?>
    <main>
      <!-- サイドナビ -->
      <?php include('./../side_navi.php') ?>
      <div id="validation" class="mainPanel">
        <form class="" action="pro_edit_check.php" method="post"  enctype="multipart/form-data">
          <input type="hidden" name="id" value=<?= $_POST['id'] ?>>
          <input type="hidden" name="oldImage" value=<?= $_POST['image'] ?>>
          <div v-if="validPrice"class="errorMsg">価格は半角数字で入力してください。</div>
          <div v-if="validPostage"class="errorMsg">送料は半角数字で入力してください。</div>
          <div v-if="validStock"class="errorMsg">在庫は半角数字で入力してください。</div>
          <table border="1">
            <tr>
              <th>商品名</th>
              <td>
                <input type="text" id="name" class="colorBlack" name="name" v-model="name" value=<?= $_POST['name'] ?>>
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
                <input type="text" id="price" class="colorBlack" name="price" v-model="price" value=<?= $_POST['price'] ?>>
              </td>
            </tr>
            <tr>
              <th>送料</th>
              <td>
                <input type="text" id="postage" class="colorBlack" name="postage" v-model="postage" value=<?= $_POST['postage'] ?>>
              </td>
            </tr>
            <tr>
              <th>カテゴリー</th>
              <td>
                <input type="text" class="colorBlack" name="category" value=<?= $_POST['category'] ?>>
              </td>
            </tr>
            <tr>
              <th>在庫</th>
              <td>
                <input type="text" id="stock" class="colorBlack" name="stock" v-model="stock" value=<?= $_POST['stock'] ?>>
              </td>
            </tr>
          </table>
          <input type="submit" class="colorBlack" name="" :disabled="isBtnActive" v-bind="isActive" value="確認画面へ">
        </form>
      </div>
    </main>
  </body>
</html>

<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/product_validation.js"></script>
