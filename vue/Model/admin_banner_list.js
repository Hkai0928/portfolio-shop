Vue.component('paginate', VuejsPaginate)

//  数値を通貨書式に変換するフィルター
Vue.filter('number_format', function(val) {
  return val.toLocaleString();
});

var app = new Vue({
  el: '#banner',
  data: {
    //  バナーリスト
    banners: [],
    //  商品リスト
    products: [],
    //   カテゴリーリスト
    categorys: [],
    // エラーの有無
    isError: false,
    // メッセージ
    message: '',
    // imageのURL
    imageUrl: "",
    //  詳細のID
    detailId: 0,
    // 商品ID
    productId: 0,
    //  選択ラジオボタンの初期値
    checkedRadio: 0,
    //  1ページの商品表示件数
    parPage: 10,
    // 表示中のページ数
    currentPage: 1,

  },
  created: function() {
    //  URLのGET送信を取得
    var id = location.href.split("=");
    if(id.length>1) {
      this.detailId = id[id.length-1];
    }

    //  編集の際の動作を変えるためにURL取得
    var url = location.href.split("/");
    var url = url[url.length-1].split("?");
    var path = url[0];

    console.log(path);

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
        this.banners[i].image = "../../../assets/banner/" + this.banners[i].image;

        //  編集時処理
        if(this.banners[i].id == this.detailId && path == "ban_edit.php") {
          this.imageUrl = this.banners[i].image;
          this.checkedRadio = this.banners[i].product_id;
        }
      }
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

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
      for (var i=0; i<this.products.length; i++) {
        this.products[i].image = "../../../assets/product/" + this.products[i].image;
      }
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

    //カテゴリーリスト取得
    var url2 = 'http://localhost/vue/api/category.php'
    // 非同期通信でJSONを読み込む
    $.ajax({
      url : url2,        // 通信先URL
      type: 'GET',      // 使用するHTTPメソッド
      dataType: 'json',
    })
    .done(function(data, textStatus, jqXHR) {
      this.categorys = data;
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

  },
  computed: {
    //  1ページに表示する件数算出
    getProducts: function() {
       let current = this.currentPage * this.parPage;
       let start = current - this.parPage;
       return this.products.slice(start, current);
     },
     // 全体のページ数算出
     getPageCount: function() {
       return Math.ceil(this.products.length / this.parPage);
     },

    //  受け取ったIDのバナーデータを返す
    resultImage: function () {
      var newPro = [];

      newPro = this.banners.filter(banners => {
        if(banners.id == this.detailId) {
          this.productId = banners.product_id;
        }
        return  banners.id == this.detailId
      })
      return newPro
    },
    //  受け取ったIDの商品データを返す
    resultPro: function () {
      var newPro = [];
      newPro = this.products.filter(products => {
        return  products.id == this.productId
      })
      return newPro
    },

  },
  methods: {
    //  表示ページ数クリック
    clickCallback: function (pageNum) {
       this.currentPage = Number(pageNum);
    },
    //  選ばれたバナーをプレビュー表示
    uploadFile: function(){
      const file = this.$refs.preview.files[0];
      this.imageUrl = URL.createObjectURL(file);
    },
    //  一覧から選ばられたとき
    select: function (id) {
      window.location.href = 'ban_detail.php?id=' + id;
    }
  }
});
