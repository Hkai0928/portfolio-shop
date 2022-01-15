<?php include('./../auth_admin.php') ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>カテゴリー一覧</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css">
    <link rel="stylesheet" href="../../common.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="cat_list.css">
  </head>
  <body>
    <?php include('../header.php') ?>
    <main>
      <!-- サイドナビ -->
      <?php include('./../side_navi.php') ?>
      <div id="app" class="mainPanel">
        <div class="contentTitle">カテゴリー一覧</div>
        <div class="info">
          ドラックアンドドロップでカテゴリーの順番入れ替え後更新でカテゴリーの順番を入れ替え可能です。
        </div>
        <form class="" action="./cat_add.php" method="post">
          <input type="hidden" name="defOrder" v-bind:value="defOrder">
          <input type="submit" class="colorBlack" value="カテゴリー追加">
        </form>
        <!-- カテゴリー一覧 -->
        <div class="category">
          <draggable v-model="categorys" @start="start" @end="end">
            <div class="item" v-for="category in categorys" :key="category.id">
              <div class="list_icon">
                <img src="../../../assets/icon/icon_listUpDown.png">
              </div>
              <div class="catInfo">
                <div class="catName">
                  {{category.name}}
                </div>
                <form class="" method="post">
                  <input type="hidden" name="id" v-bind:value="category.id">
                  <input type="hidden" name="name" v-bind:value="category.name">
                  <input type="submit" formaction="./cat_edit.php" class="colorBlack" value="編集">
                  <input type="submit" formaction="./cat_delete.php" class="colorBlack" value="削除">
                </form>
              </div>
            </div>
          </draggable>
        </div>
        <form class="" action="./category_order.php" method="post">
          <input type="hidden" name="orderId" v-bind:value="postId">
          <input type="submit" class="colorBlack" :disabled="isBtnActive" v-bind="isActive" value="更新">
        </form>
      </div>
    </main>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.23.2/vuedraggable.umd.min.js"></script>
<script src="../../../ViewModel/vue.js"></script>
<script src="../../../Model/side_navi.js"></script>
<script src="../../../Model/admin_category_list.js"></script>
