<header id="header">
  <div class="title">
    <a href="./top.php">長谷川ポートフォリオ</a>
  </div>
  <div class="title">
    <a href="./main.php">商品一覧へ</a>
  </div>
  <div class="headerIcons">
    <?php
      if(!isset($_SESSION)){
        session_start();
      }
      if(isset($_SESSION['login'])) {
    ?>
    <div class="icon">
      <a href="./user.php">
        <img src="../../assets/icon/icon_user.png">
        <br>会員情報
      </a>
    </div>
    <div class="icon">
      <a href="#">
        <img src="../../assets/icon/icon_cart.png">
        <br>カート
      </a>
    </div>
    <div class="icon">
      <a href="./logout.php">
        <img src="../../assets/icon/icon_logout.png">
        <br>ログアウト
      </a>
    </div>
  <?php }else{ ?>
    <div class="icon">
      <a href="./login.php">
        <img src="../../assets/icon/icon_login.png">
        <br>ログイン
      </a>
    </div>
  <?php } ?>
  </div>
</header>
