var app = new Vue({
  el: '#app',
  data: {
    //  メンバーリスト
    members: [],
    // エラーの有無
    isError: false,
    // メッセージ
    message: '',
  },
  created: function() {
    //JSONを返すAPIのURL
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
});
