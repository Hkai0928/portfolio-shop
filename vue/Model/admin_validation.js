var app = new Vue({
  el: '#validation',
  data: {
    name: '',
    mail: '',
    loginId: '',
    password: '',
    password2: '',
    inputCounts: {},
    isBtnActive: true,
    activeCount : 0,
  },
  created: function(){
    //  初期値があった場合に初期値セット
    if(typeof(document.getElementById('name').value) != 'undefined') {
      this.name = document.getElementById('name').value;
    }
    if(typeof(document.getElementById('mail').value) != 'undefined') {
      this.mail = document.getElementById('mail').value;
    }
    if(typeof(document.getElementById('loginId').value) != 'undefined') {
      this.loginId = document.getElementById('loginId').value;
    }
  },
  computed: {
    //  メールアドレス：メールアドレスが入力されているか
    validMail() {
      const reg = new RegExp(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/);
      //指定した組み合わせになっていなかった場合判定を返す。
      if(this.mail != "") {
        return  !reg.test(this.mail);
      }
      return false
    },
    //   ログインID：半角英数字のみ
    validLoginId() {
      const id = new RegExp(/^[0-9a-zA-Z]*$/);
      if(this.loginId != "") {
        return  !id.test(this.loginId);
      }
      return false
    },
    //   パスワード確認用
    validPass() {
      if(this.password2 != "" && this.password != this.password2) {
        this.isBtnActive = true;
        return  true;
      } else {
        return false;
      }
    },
    //  必須の入力項目が埋まった時点で確認画面ボタンをアクティブにする
    isActive() {
      this.activeCount = 4;
      var url = location.href.split("/");
      if(url[url.length-1] == "adm_edit.php" && this.password == "") {
        this.activeCount = 2;
      }  else {
        this.activeCount = 4;
      }
      return Object.keys(this.inputCounts).length > this.activeCount
          ? this.isBtnActive = false : this.isBtnActive = true;
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
    mail(mail) {
      const reg = new RegExp(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/);
      if(mail != "" && reg.test(mail)) {
        this.$set(this.inputCounts, "mail")
      } else {
        this.$delete(this.inputCounts, 'mail')
      }
    },
    loginId(loginId) {
      const id = new RegExp(/^[a-zA-Z0-9]+$/);
      if(loginId != "" && id.test(loginId)) {
        this.$set(this.inputCounts, "loginId")
      } else {
        this.$delete(this.inputCounts, 'loginId')
      }
    },
    password(password) {
      if(password != "") {
        this.isBtnActive = true;
        this.$set(this.inputCounts, "password")
      } else {
        this.$delete(this.inputCounts, 'password')
      }
    },
    password2(password2) {
      if(password2 != "" && this.password == password2) {
        this.$set(this.inputCounts, "password2")
      } else {
        this.$delete(this.inputCounts, 'password2')
      }
    },
  }

});
