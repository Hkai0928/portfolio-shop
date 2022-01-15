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
      // 会員情報
      members: [],
      //  商品トータル金額
      totalPro: 0,
      //  送料トータル金額
      totalPos: 0,
      //  トータル金額
      total: 0,
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
        //  imageのパス設定
        this.carts[i].image = "../../assets/product/" + this.carts[i].image;

        //  合計金額集計
        this.totalPro += this.carts[i].price;
        this.totalPos += this.carts[i].postage;
      }
      this.total = this.totalPro + this.totalPos;
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

    //会員情報取得
    var url = 'http://localhost/vue/api/selectMember.php'
    // 非同期通信でJSONを読み込む
    $.ajax({
      url : url,        // 通信先URL
      type: 'GET',      // 使用するHTTPメソッド
      dataType: 'json',
    })
    .done(function(data, textStatus, jqXHR) {
      this.members = data;
    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));
  },
  computed: {
    //  カートの商品件数
    count: function() {
      return this.carts.length;
    }

  },
});
