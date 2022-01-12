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
      <div class="addPanel">
        <div class="addProduct">
          <div class="addMsg">
            商品をカートに追加しました。
          </div>
          <div class="item" v-for="product in resultKey">
            <div class="image">
              <img v-bind:src="product.image" alt="">
            </div>
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
        <div class="navi">
          <button class="colorBlack" onclick="location.href='./main.php'">ショッピングを続ける</button>
          <button class="buyBtn" onclick="location.href='./cart.php'">購入手続き</button>
        </div>
      </div>
    </main>
    <footer></footer>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/cart.js"></script>
