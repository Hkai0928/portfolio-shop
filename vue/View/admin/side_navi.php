<div id="tab">
  <div class="sideNavi">
    <ul>
      <li>会員情報
        <ul>
          <li @click.stop="isSelectContents('1')" v-bind:="showContents">一般会員</li>
          <li @click.stop="isSelectContents('2')">管理者</li>
        </ul>
      </li>
      <li>商品情報
        <ul>
          <li @click.stop="isSelectContents('3')">商品一覧</li>
          <li @click.stop="isSelectContents('4')">カテゴリー</li>
          <li @click.stop="isSelectContents('5')">バナー画像</li>
        </ul>
      </li>
    </ul>
  </div>
</div>
