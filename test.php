<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <th>name</th>
        <th>value</th>
      </tr>
      <tr v-for="item in items">
        <th>{{ item.number }}</th>
        <th>{{ item.message }}</th>
      </tr>
    </table>
  </body>
</html>

<script src="vue/ViewModel/vue.js"></script>
<script src="test.js"></script>
