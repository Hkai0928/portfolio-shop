<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>商品一覧</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="top.css">
  </head>
  <body>
    <?php include('./header.php') ?>
    <main id="app">
      <div v-for="product in resultKey">
        <table border="1">
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
        </table>
      </div>
    </main>
    <footer></footer>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/product_detail.js"></script>
