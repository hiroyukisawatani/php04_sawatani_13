<?php

//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();


//2.対象のIDを取得
$id = $_GET['id'];


//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = '';
if($status == false){
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt->errorInfo();
        exit("ErrorQuery:".$error[2]);
}else{
    $result = $stmt->fetch();

}


?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ詳細・更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
  <legend>データ詳細</legend>
  <table style="border:solid 1p ; width:100%">
    <tr>
      <th style="border:solid 1px; width:25%">本の名前</th>
      <th style="border:solid 1px; width:25%">本のURL</th>
      <th style="border:solid 1px; width:50%">コメント</th>
    </tr>
    <tr>
      <td style="border:solid 1px; width:25%"> <?= $result['bookName'] ?> </td>
      <td style="border:solid 1px; width:25%"> <?= $result['bookUrl'] ?> </td>
      <td style="border:solid 1px; width:50%"> <?= $result['bookComment'] ?> </td>
    </tr>
  </table>
  </div>
  <div class="jumbotron">
   <fieldset>
    <legend>データ更新</legend>
     <label>本の名前：<input type="text" name="bookName" value="<?= $result['bookName'] ?>"></label><br>
     <label>本のURL：<input type="text" name="bookUrl" value="<?= $result['bookUrl'] ?>"></label><br>
     <label><textArea name="bookComment" rows="4" cols="40" value="<?= $result['bookComment'] ?>"></textArea></label><br>
     <input type="hidden" name="id" value="<?= $result['id']?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
