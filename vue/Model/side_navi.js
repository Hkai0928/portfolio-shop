
/*************
  サイドナビ機能
**************/
new Vue({
  el: "#tab",
  data: {
    //  親カテゴリーの設定値
    isActiveNavi: "0",
    //  子カテゴリーの設定値
    isActiveContents: "0",
    id: "0"
  },
  created: function() {

    //  遷移元のURL取得
    var url = location.href.split("/");
    var path = url[url.length - 1];

    //  選択中naviを画面遷移後もアクティブ状態にさせる
    if (path == "main.php") {
      this.isActiveNavi = 0;
    } else {
      // sessionStorage に保存したデータを取得する
      this.isActiveNavi = sessionStorage.getItem('isActiveNavi');
    }
  },
  methods: {
    //  親カテゴリーが押されたとき
    isSelectNavi: function (num) {
      if(this.isActiveNavi === num) {
        this.isActiveNavi = "0";
      }else {
        this.isActiveNavi = num;
      }
    },
    //  子カテゴリーが押されたとき
    isSelectContents: function (num) {
      this.isActiveContents = num;
    }
  },
  computed: {
    //  サイドナビのコンテンツへの遷移
    showContents: function() {
      //  遷移元のURL取得
      var url = location.href.split("/");
      var path = url[url.length-1];
      var file = url[url.length-2];

      //  一般会員タブ
      if(this.isActiveContents == 1){
        // sessionStorage にデータを保存する
        sessionStorage.setItem('isActiveNavi', this.isActiveNavi);

        // 遷移元によってパスを変える
        if(path == "main.php" ) {
          window.location.href = './member/mem_list.php';
        } else if(file == "member") {
          window.location.href = './mem_list.php';
        } else {
          window.location.href = '../member/mem_list.php';
        }
      }
      //  管理者タブ
      if(this.isActiveContents == 2){
        // sessionStorage にデータを保存する
        sessionStorage.setItem('isActiveNavi', this.isActiveNavi);

        // 遷移元によってパスを変える
        if(path == "main.php" ) {
          window.location.href = './admin/adm_list.php';
        } else if(file == "admin") {
          window.location.href = './adm_list.php';
        } else {
          window.location.href = '../admin/adm_list.php';
        }
      }
      //  商品一覧
      if(this.isActiveContents == 3){
        // sessionStorage にデータを保存する
        sessionStorage.setItem('isActiveNavi', this.isActiveNavi);

        // 遷移元によってパスを変える
        if(path == "main.php" ) {
          window.location.href = './product/pro_list.php';
        } else if(file == "product") {
          window.location.href = './pro_list.php';
        } else {
          window.location.href = '../product/pro_list.php';
        }
      }
      //  商品カテゴリー
      if(this.isActiveContents == 4){
        // sessionStorage にデータを保存する
        sessionStorage.setItem('isActiveNavi', this.isActiveNavi);

        // 遷移元によってパスを変える
        if(path == "main.php" ) {
          window.location.href = './category/cat_list.php';
        } else if(file == "category") {
          window.location.href = './cat_list.php';
        } else {
          window.location.href = '../category/cat_list.php';
        }
      }
      //  バナー
      if(this.isActiveContents == 5){
        // sessionStorage にデータを保存する
        sessionStorage.setItem('isActiveNavi', this.isActiveNavi);

        // 遷移元によってパスを変える
        if(path == "main.php" ) {
          window.location.href = './banner/ban_list.php';
        } else if(file == "banner") {
          window.location.href = './ban_list.php';
        } else {
          window.location.href = '../banner/ban_list.php';
        }
      }
    },
  }
});
