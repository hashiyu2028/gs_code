<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST["name"];
$url = $_POST["url"];
$comment = $_POST["comment"];


//2. DB接続します
include "funcs.php";
$pdo = db_con();


//３．データ登録SQL作成  memo_PDOを使うとデータが壊れにくい bindValueで暗号化してデータを渡してあげる
$sql = "INSERT INTO gs_bm_table (name,url,comment,indate) VALUES (:name, :url,:comment,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR );  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 数値の場合はINT, 文字列の場合はSTR

$status = $stmt->execute(); //execute で実行。TRUE or FALSE が帰ってくる

//４．データ登録処理後
if ($status == false) {
  sqlError($stmt);
} else {
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}

// if($status==false){
//   //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//   function sqlError ($stmt){
//     $error = $stmt->errorInfo();
//     exit("SQL_ERROR:".$error[2]); // 毎回この書き方。2 は人間が目で見てわかるエラー。
//   }
// }else{
//   //５．index.phpへリダイレクト
//   header("Location index.php");
//   exit;
// }
