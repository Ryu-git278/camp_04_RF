<!-- 編集中！時間があれば直す！ログインがザルになってる…。 -->


<?php

// テンプレA

try {
    $pdo = new PDO('mysql:dbname=saku;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。'.$e->getMessage());
    }
    

// テンプレB

$stmt = $pdo->prepare("SELECT * FROM saku_user");
$status = $stmt->execute();


// 以下参考サイトより
//ログイン認証
function calf_authAdmin($user,$password){
	
	//ログアウト処理
	if(isset($_GET['logout'])){
		$_SESSION = array();
		session_destroy();//セッションを破棄
	}
	
	$error = '';
	# セッション変数を初期化
	if (!isset($_SESSION['auth'])) {
	  $_SESSION['auth'] = FALSE;
	}
	
	if (isset($_POST['user']) && isset($_POST['user'])){
	  foreach ($user as $key => $value) {
		if ($_POST['user'] === $user[$key] &&
			$_POST['password'] === $password[$key]) {
		  $oldSuser = session_user();
		  session_regenerate_user(TRUE);
		  if (version_compare(PHP_VERSION, '5.1.0', '<')) {
			$path = session_save_path() != '' ? session_save_path() : '/tmp';
			$oldSessionFile = $path . '/sess_' . $oldSuser;
			if (file_exists($oldSessionFile)) {
			  unlink($oldSessionFile);
			}
		  }
		  $_SESSION['auth'] = TRUE;
		  break;
		}
	  }
	  if ($_SESSION['auth'] === FALSE) {
		$error = '<div style="text-align:center;color:red">ユーザーIDかパスワードに誤りがあります。</div>';
	  }
	}
	if ($_SESSION['auth'] !== TRUE) {

        exit();
            }
        }
        
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sakstagram</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>

<body>
    <a class="header" href="select.php"><h2>Sakstagram</h2></a>

<div class="contents">
    <h2>管理画面に入場するにはログインする必要があります。<br />
	（実は追加したタグなのでpasswordは何でもOKですはい。）</h2>
</div>

<form action="./" method="post">
<label for="user">ユーザーID</label>
<input class="input" type="text" name="user" id="user" value="" style="ime-mode:disabled" required/>
<label for="password">パスワード</label>      
<input class="input" type="password" name="password" id="password" value="" size="30" required />
<p class="taC">


<div class="btn-area">
      <input type="submit" name="login_submit" value="　ログイン　"><input type="reset" value="リセット">
</div>

<!-- <input class="button-primary" type="submit" name="login_submit" value="　ログイン　" /> -->
</form>
</div>
</body>
</html>
