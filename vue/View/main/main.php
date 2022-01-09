<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>商品一覧</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <?php include('./header.php') ?>
    <main>
      <div id="app">
        <!-- 検索欄 -->
        <div class="searchBox">
          <select  class="colorBlack" name="cat_id" v-model="categoryValue">
            <option value='0'>すべての商品</option>
            <option v-for="category in categorys" v-bind:value="category.id">
              {{ category.name }}
            </option>
          </select>
          <div class="colorBlack"><input type="text" v-model="searchText" placeholder="キーワードで探す"></div>
          <input type="button" @click="search" class="colorBlack" name="" value="検索">
        </div>
        <div id="container">
          <div id="mainContainer">
            <h1 class="pageTitle">商品一覧</h1>
            <!-- 検索条件 -->
            <div class="search">
              <div class="result">
                検索結果<span class="count">{{count}}件</span>
              </div>
              <div class="condition">
                <div class="target">
                  <label><input type="checkbox" @change="search" v-model="showPosFree">送料無料</label>
                </div>
                <div class="sort">
                  <label for="sort">並び替え</label>
                  <select id="sort" @change="search" class="sorting select1 text-black-50" v-model.number="sortOrder">
                    <option value="1">標準</option>
                    <option value="2">価格が安い順</option>
                    <option value="3">価格が高い順</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- 商品一覧 -->
            <div v-if="isError" class="error">{{message}}</div>
            <div v-if="count > 0">
              <div class="list">
                <div class="item" v-for="product in getProducts" v-bind:key="product.id" @click="selectPro(product.id)">
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
                    </template class="stockBox">
                    <template v-if="product.stock > 0">
                      <div class="stock">在庫あり</div>
                    </template>
                    <template v-else>
                      <div class="stockNone">在庫なし</div>
                    </template>
                  </div>
                </div>
              </div>
              <!-- ページネーション -->
              <paginate
              :value="getValue"
              :page-count="getPageCount"
              :page-range="3"
              :margin-pages="2"
              :click-handler="clickCallback"
              :prev-text="'＜'"
              :next-text="'＞'"
              :container-class="'pagination'"
              :page-class="'page-item'">
            </paginate>
            </div>
            <!-- 検索結果が0件だった場合 -->
            <div v-else>
              検索に一致する商品は見つかりませんでした。
            </div>
          </div>
        </div>

      </div>
    </main>
    <footer></footer>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/vuejs-paginate@2.1.0"></script>
<script src="../../ViewModel/vue.js"></script>
<script src="../../Model/main.js"></script>
<script>
</script>
