<?php include('./../auth_admin.php') ?>

<?php
  if(!empty($_FILES)){

    //$_FILESからファイル名を取得する
    $filename = $_FILES['image']['name'];

    //$_FILESから保存先を取得してフォルダに移す
    $uploaded_path = '../../../assets/temp_product/'.$filename;

    move_uploaded_file($_FILES['image']['tmp_name'],$uploaded_path);
  }

?>

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
      <div id="category" class="mainPanel">
        <div>下記内容で商品を追加してよろしいでしょうか？。</div>
        <table border="1">
          <tr>
            <th>商品名</th>
            <td><?= $_POST['name'] ?></td>
          </tr>
          <tr>
            <th>商品画像</th>
            <td><?= $filename ?></td>
          </tr>
          <tr>
            <th>価格</th>
            <td><?= $_POST['price'] ?></td>
          </tr>
          <tr>
            <th>送料</th>
            <td><?= $_POST['postage'] ?></td>
          </tr>
          <tr>
            <th>カテゴリー</th>
            <td>
              <div v-for="category in categorys" :key="category.id">
                <div v-if="category.id == <?= $_POST['cat_id'] ?>">
                  {{ category.name }}
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th>在庫</th>
            <td><?= $_POST['stock'] ?></td>
          </tr>
        </table>
        <form action="pro_add_done.php" method="post">
          <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
          <input type="hidden" name="image" value="<?= $filename ?>">
          <input type="hidden" name="price" value="<?= $_POST['price'] ?>">
          <input type="hidden" name="postage" value="<?= $_POST['postage'] ?>">
          <input type="hidden" name="category" value="<?= $_POST['cat_id'] ?>">
          <input type="hidden" name="stock" value="<?= $_POST['stock'] ?>">
          <div><input type="submit" class="colorBlack" value="追加"></div>
        </form>
      </div>
    </main>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/get_category_list.js"></script>
