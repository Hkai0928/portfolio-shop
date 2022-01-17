var app = new Vue({
  el: '#validation',
  data: {
    //   カテゴリーリスト
    categorys: [],
    name: '',
    price: '',
    postage: '',
    category: '0',
    stock: '',
    inputCounts: {},
    isBtnActive: true,
  },
  created: function(){
    //JSONを返すAPIのURL
    var url = 'https://hk-portfolio-shop.com/shop/vue/api/category.php'
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

    // //  遷移元のURL取得
    var url = location.href.split("/");
    var path = url[url.length-1];
    //  追加チェックから戻ってきた際に初期値セット
    if(path == "pro_add_check.php") {
      // sessionStorage に保存したデータを取得する
      this.name = sessionStorage.getItem('pro_name');
      this.price = sessionStorage.getItem('pro_price');
      this.postage = sessionStorage.getItem('pro_postage');
      this.category = sessionStorage.getItem('pro_category');
      this.stock = sessionStorage.getItem('pro_stock');
    } else {
      sessionStorage.removeItem('pro_name');
      sessionStorage.removeItem('pro_price');
      sessionStorage.removeItem('pro_postage');
      sessionStorage.removeItem('pro_category');
      sessionStorage.removeItem('pro_stock');
    }

  },
  computed: {
    //  価格：半角数字のみ
    validPrice() {
        return isNaN(this.price);
    },
    //  送料：半角数字のみ
    validPostage() {
        return isNaN(this.postage);
    },
    //  在庫：半角数字のみ
    validStock() {
        return isNaN(this.stock);
    },
    //
    isActive() {
      // sessionStorage にデータを保存する
      sessionStorage.setItem('pro_name', this.name);
      sessionStorage.setItem('pro_price', this.price);
      sessionStorage.setItem('pro_postage', this.postage);
      sessionStorage.setItem('pro_category', this.category);
      sessionStorage.setItem('pro_stock', this.stock);

      return Object.keys(this.inputCounts).length > 4 ? this.isBtnActive = false : this.isBtnActive = true;
    },
  },
  watch: {
    name(name) {
      if(name != "") {
        this.$set(this.inputCounts, "name")
      } else {
        this.$delete(this.inputCounts, 'name')
      }
    },
    price(price) {
      if(! isNaN(price) && price != "") {
        this.$set(this.inputCounts, "price")
      } else if(price == "") {
        this.$delete(this.inputCounts, 'price')
      }
    },
    postage(postage) {
      if(! isNaN(postage) && postage != "") {
        this.$set(this.inputCounts, "postage")
      } else if(postage == "") {
        this.$delete(this.inputCounts, 'postage')
      }
    },
    category(category) {
      if(! isNaN(category) && category != "") {
        this.$set(this.inputCounts, "category")
      } else if(category == "") {
        this.$delete(this.inputCounts, 'category')
      }
    },
    stock(stock) {
      if(! isNaN(stock) && stock != "") {
        this.$set(this.inputCounts, "stock")
      } else if(stock == "") {
        this.$delete(this.inputCounts, 'stock')
      }
    },
  }

});
