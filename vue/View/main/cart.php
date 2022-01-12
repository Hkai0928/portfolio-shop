<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>商品一覧</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="cart.css">
  </head>
  <body>
    <?php include('./header.php') ?>
    <main id="app">
      <div class="contentTitle">ショッピングカート</div>
      <div class="cartList">
        <!-- カート内リスト -->
        <div class="list">
          <div class="item" v-for="product in carts">
            <figure class="image">
              <img v-bind:src="product.image" alt="">
            </figure>
            <div class="detail">
              <div class="name">{{ product.name }}</div>
              <div class="price"><span>{{ product.price | number_format }}</span>円（税込）</div>
              <template v-if="product.postage == 0">
                <div class="shipping-fee none">送料無料</div>
              </template>
              <template v-else>
                <div class="shipping-fee">+送料{{ product.postage | number_format }}円</div>
              </template>
            </div>
          </div>
        </div>
        <!-- カート合計値段・購入ボタン -->
        <div class="total">
          <table>
            <tr>
              <td>商品小計（{{ count }}）点</td>
              <td>￥ {{ totalPro | number_format }}</td>
            </tr>
            <tr>
              <td>送料</td>
              <td>￥ {{ totalPos | number_format }}</td>
            </tr>
          </table>
          <div class="borderLine"></div>
          <table>
            <tr>
              <td>合計金額</td>
              <td>￥ {{ total | number_format }}</td>
            </tr>
          </table>
          <button class="buyBtn" onclick="location.href='./buy.php'">購入手続き</button>
        </div>
      </div>
    </main>
    <footer></footer>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/vuejs-paginate@2.1.0"></script>
<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/cart.js"></script>
