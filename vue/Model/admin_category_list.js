const draggable = window['vuedraggable'];

// function dumpObj(obj: any): string {
//   return JSON.stringify(obj, null, 2)
// }

var app = new Vue({
  el: '#app',
  components: {
    'draggable': draggable,
  },
  data: function() {
    return  {
      //  リスト
      categorys: [],
      // エラーの有無
      isError: false,
      // メッセージ
      message: '',
      //  並べ替え用のID配列
      idOrder: [],
      // POST用のID文字列
      postId: '',
      //  orderの初期値用の値
      defOrder: 0,
      //  categoryの名前編集用
      catName: '',
      //  更新ボタンのアクティブ
      isBtnActive: true,
    }
  },
  created: function() {
    //JSONを返すAPIのURL
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
      this.defOrder = this.categorys.length;

      var array = [];
      for(var i=0; i<this.categorys.length; i++) {
        array.push(this.categorys[i].name);
      }
      this.catName = array.join(',');

    }.bind(this))
    .fail(function(jqXHR, textStatus, errorThrown) {
      this.isError = true;
      this.message = '商品リストの読み込みに失敗しました。';
    }.bind(this));

  },
  computed: {
    //  更新ボタンのアクティブ判定
    isActive() {
      if(this.postId != "") {
        this.isBtnActive = false;
      } else {
        this.isBtnActive = true;
     }
    }
  },
  methods: {
    //  カテゴリードラックで値初期化
    start: function() {
      this.idOrder = [];
      this.postId = '';
    },
    //  カテゴリードロップでorder用の値セット
    end: function() {
      for(var i=0; i<this.categorys.length; i++) {
        this.idOrder.push(this.categorys[i].id);
      }
      this.postId = this.idOrder.join(',');
    },

  }
});
