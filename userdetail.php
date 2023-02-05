<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET['id'];


//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
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
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="userselect.php">管理者一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="userupdate.php">
  <div class="jumbotron">
   <fieldset>
    <legend>管理者更新</legend>
     <label>名前：<input type="text" name="name" value="<?= $result['name'] ?>"></label><br>
     <label>管理者ID：<input type="text" name="lid" value="<?= $result['lid'] ?>"></label><br>
     <label>管理者PW：<input type="text" name="lpw" value="<?= $result['lpw'] ?>"></label><br>
     <label>種類：
      <select name="kanri_flg" value="<?= $result['kanri_flg'] ?>">
      <option value="0">管理者</option>
      <option value="1">スーパー管理者</option>
      </select>
      <br>
      <label>ステータス：
      <select name="life_flg" value="<?= $result['life_flg'] ?>">
      <option value="0">退社</option>
      <option value="1">入社</option>
      </select>
      <br>
     
     <input type="hidden" name="id" value="<?= $result['id']?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
