<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>本のデータ登録</title>
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
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div><!-- ここを追記 -->
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div><!-- ここを追記 -->
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本のお気に入り</legend>
     <label>本のタイトル：<input type="text" name="bookName"></label><br>
     <label>本のURL：<input type="text" name="bookUrl"></label><br>
     <label>コメント：<textArea name="bookComment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
