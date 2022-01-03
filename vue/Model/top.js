const VueCarousel  = window.VueCarousel.default;
Vue.use(VueCarousel);

var app = new Vue({
  el: '#app',
  data: function() {
    return  {
      //  商品リスト
      products: [],
      //   カテゴリーリスト
      categorys: [],
      //  バナーリスト
      banners: [],
      // 人気商品リスト
      top5: [],
      // エラーの有無
      isError: false,
      // メッセージ
      message: '',
      //  並べ替え用のID配列
      idOrder: [],
    }
  },
  created: function() {
    //商品リスト取得
    var url = 'http://localhost/vue/api/products.php'
    // 非同期通信でJSONを読み込む
    $.ajax({
      url : url,        // 通信先URL
      type: 'GET',      // 使用するHTTPメソッド
      dataType: 'json',
    })
    .done(function(data, textStatus, jqXHR) {
      this.products = data;
      this.products = this.products.sort((a, b) => b.sale - a.sale)
      for(var i=0; i<5; i++) {
        this.products[i].image = "../../assets/product/" + this.products[i].image;
        this.top5.push(this.products[i]);
      }
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

    //カテゴリーリスト取得
    var url = 'http://localhost/vue/api/category.php'
    // 非同期通信でJSONを読み込む
    $.ajax({
      url : url,        // 通信先URL
      type: 'GET',      // 使用するHTTPメソッド
      dataType: 'json',
    })
    .done(function(data, textStatus, jqXHR) {
      this.categorys = data;
      this.categorys = this.categorys.sort((a, b) => a.order - b.order);
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

    //バナーリスト取得
    var url = 'http://localhost/vue/api/banner.php'
    // 非同期通信でJSONを読み込む
    $.ajax({
      url : url,        // 通信先URL
      type: 'GET',      // 使用するHTTPメソッド
      dataType: 'json',
    })
    .done(function(data, textStatus, jqXHR) {
      this.banners = data;
      for (var i=0; i<this.banners.length; i++) {
        this.banners[i].image = "../../assets/banner/" + this.banners[i].image;
      }
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

  },
  methods: {
    // 人気商品選択時
    selectPro: function (pro_id) {
      window.location.href = 'detail.php?product=' + pro_id;
    },

    // カテゴリー選択時
    selectCat: function (cat_id) {
      window.location.href = 'main.php?category=' + cat_id;
    },

    //  バナーセレクト時
    selectBan: function (pro_id) {
      window.location.href = 'detail.php?product=' + pro_id;
    }
  }
});
