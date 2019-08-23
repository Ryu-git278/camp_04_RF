<?php
//1. POSTデータ取得

//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
// $xxx = $_POST["xxx"];
// $xxx = $_POST["xxx"];
// $xxx = $_POST["xxx"];

$hashtag = $_POST["hashtag"];
$text = $_POST["text"];
$userfile = $_FILES["userfile"]['tmp_name']; //画像を上げる際は$_FILESでやらないだめ！
// $userfile = $_POST["userfile"];


//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxx(今回はa_dbのところ)に作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=saku;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
// $stmt = $pdo->prepare("INSERT INTO saku_table(id, hashtag, text, userfile, indate )
// VALUES(NULL, :hashtag, :text, :userfile, sysdate())");
// $stmt->bindValue(':hashtag', $hashtag, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':userfile', $userfile, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $status = $stmt->execute();


$stmt = $pdo->prepare("INSERT INTO saku_table(id, hashtag, text, userfile, indate )
VALUES(NULL, :hashtag, :text, :userfile, sysdate())");
$stmt->bindValue(':hashtag', $hashtag, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userfile', file_get_contents($userfile), PDO::PARAM_STR);  //画像の場合 file_get_contents($upfile)
$status = $stmt->execute();



//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
  header("Location: select.php");
  exit;

}
?>
