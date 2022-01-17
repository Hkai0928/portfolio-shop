Vue.component('paginate', VuejsPaginate)

//  数値を通貨書式に変換するフィルター
Vue.filter('number_format', function(val) {
  return val.toLocaleString();
});

var app = new Vue({
  el: '#app',
    data: {
    //  カテゴリー初期値
    categoryValue: '0',
    //  検索ユーザー入力
    searchText: '',
    //  「送料無料」のチェック状態   (true:チェック有、 false:チェック無)
    showPosFree: false,
    //  「並び替え」の選択値        (1:標準、 2:価格が安い順)
    sortOrder: 1,
    //  商品取得用リスト
    products: [],
    // 絞り込み後の商品リスト
    newList: [],
    //  カテゴリーリスト
    categorys: [],
    //  1ページの商品表示件数
    parPage: 5,
    // 表示中のページ数
    currentPage: 1,
    //  上書き選択ページ番号
    forcePage: 1,
    // エラーの有無
    isError: false,
    // メッセージ
    message: ''
  },
  created: function() {
    //商品リスト取得
    var url = 'https://hk-portfolio-shop.com/shop/vue/api/products.php'
    // 非同期通信でJSONを読み込む
    $.ajax({
      url : url,        // 通信先URL
      type: 'GET',      // 使用するHTTPメソッド
      dataType: 'json',
    })
    .done(function(data, textStatus, jqXHR) {
      this.products = data;
      this.newList = data;
      for (var i=0; i<this.products.length; i++) {
        //  imageのパス設定
        this.products[i].image = "../../assets/product/" + this.products[i].image;
      }
      //  TOPからのカテゴリー選択遷移
      var url = new URL(window.location.href);
      var params = url.searchParams;
      if(params.get('category') != null) {
        this.categoryValue = params.get('category');
        this.search();
      }

    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));


    //カテゴリーリスト取得
    var url2 = 'https://hk-portfolio-shop.com/shop/vue/api/category.php'
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

    for (var i=0; i<this.products.length; i++) {

    }
  },
  computed: {
    //  商品リスト件数
    count: function() {
      return this.newList.length;
    },
    //  1ページに表示する件数算出
    getProducts: function() {
       let current = this.currentPage * this.parPage;
       let start = current - this.parPage;
       return this.newList.slice(start, current);
    },
     // 全体のページ数算出
    getPageCount: function() {
      return Math.ceil(this.newList.length / this.parPage);
    },
    //  検索語のページ数上書き
    getValue: function() {
      return this.currentPage;
    }

  },
  methods: {
    //  検索機能実行
    search : function() {
      // 表示用リスト初期化
      this.newList = [];

      //表示ページを1ページ目に
      var a = this;
      a.clickCallback(1);

      //  検索条件の有無判定
      if(this.categoryValue == "0" && this.searchText == "" &&
        this.showPosFree == false && this.sortOrder == 1)
      {
        this.newList = this.products;
      } else {
        this.newList = this.products;
        //  カテゴリー絞り込み
        if(this.categoryValue != "0") {
          var selectCat = this.categoryValue;
          this.newList = this.newList.filter(function(item) {
            return item.category == selectCat ;
          });
        }

        // 文字列による絞り込み
        if(this.searchText != "") {
          var searchWord = this.searchText.trim()
          this.newList = this.newList.filter(function(item) {
            return item.name.includes(searchWord)
          });
        }

        //  送料チェックボックス判定
        if(this.showPosFree) {
          this.newList = this.newList.filter(function(item) {
            return item.postage <= 0;
          });
        }
      }

      //  表示並び
      if(this.sortOrder == 2) {
        this.newList.sort(function(a,b) {
          return a.price - b.price;
        });
      }
      if(this.sortOrder == 3) {
        this.newList.sort(function(a,b) {
          return b.price - a.price;
        });
      }
    },

    // 商品選択
    selectPro: function (pro_id) {
      window.location.href = 'detail.php?product=' + pro_id;
    },

    //  商品検索結果
    serchResult: function(list) {
      //  空白文字削除
      var searchWord = this.searchText.trim()

      return list.filter(product => {
        return product.name.includes(searchWord)
      })
    },
    //  表示ページ数クリック
    clickCallback: function (pageNum) {
       this.currentPage = Number(pageNum);
    },
  }
});
