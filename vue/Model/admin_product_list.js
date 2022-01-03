Vue.component('paginate', VuejsPaginate)

//  数値を通貨書式に変換するフィルター
Vue.filter('number_format', function(val) {
  return val.toLocaleString();
});

var app = new Vue({
  el: '#app',
  data: {
    //  商品リスト
    products: [],
    //   カテゴリーリスト
    categorys: [],
    //  1ページの商品表示件数
    parPage: 10,
    // 表示中のページ数
     currentPage: 1,
    // エラーの有無
    isError: false,
    // メッセージ
    message: '',
    //  詳細表示ID
    detailId: 0,
    //
    imageFile : '',
  
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
      this.categorys = this.categorys.sort((a, b) => a.order - b.order);
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));


    //  遷移元のURL取得
    var url = location.href.split("=");
    if(url.length>1) {
      this.detailId = url[url.length-1];
    }
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

    //  受け取ったIDのデータを返す
    resultKey: function () {
      var newPro = [];
      newPro = this.products.filter(products => {
        return  products.id  == this.detailId
      })
      return newPro
    }
  },
  methods: {
    //  表示ページ数クリック
    clickCallback: function (pageNum) {
       this.currentPage = Number(pageNum);
    },
    select: function (id) {
      window.location.href = 'pro_detail.php?id=' + id;
    }
  }
});
