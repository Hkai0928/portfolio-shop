<?php
  $url = $_SERVER['REQUEST_URI'];
  $urlArray = explode("/",$url);
  $fileName = $urlArray[count($urlArray)-1];
 ?>
 <?php if($fileName=="main.php") {?>
   <header id="header">
     <a href="./main.php"><div class="title">管理画面</div></a>
     <a href="./logout.php" class="logoutIcon">
       <img src="../../assets/icon/icon_logout.png">
     </a>
   </header>
 <?php } else { ?>
  <header id="header">
    <a href="../main.php"><div class="title">管理画面</div></a>
    <a href="../logout.php" class="logoutIcon">
      <img src="../../../assets/icon/icon_logout.png">
    </a>
  </header>
<?php } ?>
