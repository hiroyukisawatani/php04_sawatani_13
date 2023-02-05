<?php

//SESSIONスタート
session_start();

//selsect.phpから処理を持ってくる
//1.対象のIDを取得
$id = $_GET['id'];


//2.DB接続します
require_once('funcs.php');
$pdo = db_conn();

//ログインチェック
loginCheck();
//以下ログインユーザーのみ

//3.削除SQLを作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ削除処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
  }else{
    //５．index.phpへリダイレクト
    redirect('userselect.php');
  }

