<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="userselect.php">管理者一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="userinsert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>管理者追加</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ログインID：<input type="text" name="lid"></label><br>
     <label>ログインPW：<input type="text" name="pw"></label><br>
     <label>種類：
      <select name="kanri_flg">
      <option value="0">管理者</option>
      <option value="1">スーパー管理者</option>
      </select>
      <br>
      <label>ステータス：
      <select name="life_flg">
      <option value="0">退社</option>
      <option value="1">入社</option>
      </select>
      <br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
