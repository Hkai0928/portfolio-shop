<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>商品一覧</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="buy.css">
  </head>
  <body>
    <?php include('./header.php') ?>
    <main id="app">
      <div class="contentTitle">注文確定</div>
      <div class="contentInfo">注文情報を確認し、注文を確定してください。</div>
      <div class="cartList">
        <!-- カート内リスト -->
        <div class="list">
          <div class="contentTitle">お届け先情報</div>
          <div class="contentInfo">
            <div class="memberInfo" v-for="member in members">
              <table>
                <tr>
                  <td>名前</td>
                  <td>{{ member.name }}</td>
                </tr>
                <tr>
                  <td>住所</td>
                  <td>{{ member.address }}</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="contentTitle">お支払方法</div>
          <div class="contentInfo">
            着払いのみ
          </div>
          <div class="contentTitle">ショッピングカート</div>
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
              <td class="tdL">商品小計（{{ count }}）点</td>
              <td class="tdR">￥ {{ totalPro | number_format }}</td>
            </tr>
            <tr>
              <td class="tdL">送料</td>
              <td class="tdR">￥ {{ totalPos | number_format }}</td>
            </tr>
          </table>
          <div class="borderLine"></div>
          <table>
            <tr>
              <td class="tdL">合計金額</td>
              <td class="tdR">￥ {{ total | number_format }}</td>
            </tr>
          </table>
          <button class="buyBtn" onclick="location.href='./buy_done.php'">注文確定</button>
        </div>
      </div>
    </main>
    <footer></footer>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/vuejs-paginate@2.1.0"></script>
<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/buy.js"></script>
