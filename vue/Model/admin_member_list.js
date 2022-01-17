Vue.component('paginate', VuejsPaginate)

//  数値を通貨書式に変換するフィルター
Vue.filter('number_format', function(val) {
  return val.toLocaleString();
});

var app = new Vue({
  el: '#app',
  data: {
    //  メンバーリスト
    members: [],
    //  1ページの商品表示件数
    parPage: 10,
    // 表示中のページ数
     currentPage: 1,
    // エラーの有無
    isError: false,
    // メッセージ
    message: '',
    //  詳細表示ID
    detailId: 0
  },
  created: function() {
    //JSONを返すAPIのURL
    var url = 'https://hk-portfolio-shop.com/shop/vue/api/member.php'
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

    //  遷移元のURL取得
    var url = location.href.split("=");
    if(url.length>1) {
      this.detailId = url[url.length-1];
    }
  },
  computed: {
    //  1ページに表示する件数算出
    getMembers: function() {
       let current = this.currentPage * this.parPage;
       let start = current - this.parPage;
       return this.members.slice(start, current);
     },
     // 全体のページ数算出
     getPageCount: function() {
       return Math.ceil(this.members.length / this.parPage);
     },
     //  受け取ったIDのデータを返す
     resultKey: function () {
       var newPro = [];
       newPro = this.members.filter(members => {
         return  members.id  == this.detailId
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
      window.location.href = 'mem_detail.php?id=' + id;
    }
  }
});
