<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <title>TOPページ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="top.css">
  </head>
  <body>
    <?php include('./header.php') ?>
    <main id="app">
      <!-- カルーセルスライド -->
      <div class="content">
        <div class="carousel">
          <carousel
            :per-page="1"
            :loop="true"
            :navigation-enabled="true"
            navigation-prev-label="＜"
            navigation-next-label="＞"
          >
            <slide v-for="banner in banners">
              <div class="slider-inner">
                <img class="" v-bind:src="banner.image" alt="" @click="selectBan(banner.product_id)">
              </div>
            </slide>
          </carousel>
        </div>
      </div>
      <!-- 人気商品ランキング -->
      <div class="content">
        <div class="contentTitle">人気商品ランキング</div>
        <div class="popularList">
          <div class="click popularItem" v-for="(product, index) in top5" :key="product.id"@click="selectPro(product.id)">
            <div class="clickNone">
              {{ index + 1 }}位
            </div>
            <div>
              <img v-bind:src="product.image" alt="">
              <br>{{ product.name }}
            </div>
          </div>
        </div>
      </div>
      <!-- カテゴリー欄 -->
      <div class="content">
        <div class="contentTitle">カテゴリーから探す</div>
          <ul class="click" v-for="category in categorys" :key="category.id" @click="selectCat(category.id)" >
            <li class="">
              {{ category.name }}
            </li>
          </ul>
      </div>
    </main>
    <footer></footer>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-carousel@0.18.0/dist/vue-carousel.min.js"></script>
<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/top.js"></script>
