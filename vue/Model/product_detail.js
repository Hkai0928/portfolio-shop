//  数値を通貨書式に変換するフィルター
Vue.filter('number_format', function(val) {
  return val.toLocaleString();
});


var app = new Vue({
  el: '#app',
  data: function() {
    return  {
      //  商品リスト
      products: [],
      //  カートリスト
      carts: [],
      //  カートに追加済みかフラグ
      cartAddFlg: 0,
      //  商品ID
      detailId: 0,
      // エラーの有無
      isError: false,
      // メッセージ
      message: '',
      //  並べ替え用のID配列
      idOrder: [],
    }
  },
  created: function() {
    var url = new URL(window.location.href);
    var params = url.searchParams;
    if(params.get('product') != null) {
      this.detailId = params.get('product');
    }

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
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

    //カートリスト取得
    var url = 'http://localhost/vue/api/cartList.php'
    // 非同期通信でJSONを読み込む
    $.ajax({
      url : url,        // 通信先URL
      type: 'GET',      // 使用するHTTPメソッド
      dataType: 'json',
    })
    .done(function(data, textStatus, jqXHR) {
      this.carts = data;
      for (var i=0; i<this.carts.length; i++) {
        if(this.carts[i].id == this.detailId) {
          this.cartAddFlg = 1;
        }
      }
      this.total = this.totalPro + this.totalPos;
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

  },
  computed: {
    //  受け取ったIDのデータを返す
    resultKey: function () {
      var newPro = [];
      newPro = this.products.filter(products => {
        return  products.id  == this.detailId
      })
      for (var i=0; i<newPro.length; i++) {
        this.imageFile = newPro[i].image;
        newPro[i].image = "../../assets/product/" + newPro[i].image;
      }
      return newPro
    }
  },
});
