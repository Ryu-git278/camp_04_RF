<!-- select.phpを中心に微調整に留める。 -->

<?php
// アンダーリンクから、リンク設定
$site_top = "index.php";
?>

<!-- 動画抗議より、遊びPHP -->
<?php
 $d = date("s"); //秒だけ取得
 if( $d >= 30 ){ echo '<p style="color:red;">早くsakusutaguramuに写真をアップしろよー30秒以上選んでるぞー。</p>';
 }else{
 echo '<p style="color:blue;">厳選してsakusutaguramuにアップしろよーまだ29秒以下だぞー。</p>';
 }echo '<p>現在：'.$d.'秒</p>';
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Sakstagram</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/formstyle.css">

</head>
<body>

<!-- Head[Start] -->
<header>
  <nav>
      <div class="header">
        <a class="header" href="select.php"><h2>Sakstagram</h2></a>
      </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- contents[Start] -->

<section>
  <div class="contents">
      <div class="prof">
        <img src="Photos/IMG_20190311_profile.jpg" width="150px" height="150px" />    
      </div>
        <div id="ex">
              <h2>咲丸。プロフィール<br>クリック</h2>
        </div>
  </div>
</section>

<!-- contents[end] -->


<!-- Main[Start] -->
<!-- ここでinsert.phpにデータを送っている -->
<!-- <form method="post" action="insert.php"> -->

<!-- ここでinsert.phpにデータを送っている ※画像アップ　enctype="multipart/form-data"-->
<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="formbox">
   <fieldset>
    <h3>sakstagramへ写真を送る</h3>
      <!-- name="xxx" の部分に注目するようにしておいてください🤗
      name、email、naiyouを書き換え…。そもそも受け取り先を変更する必要あり！ -->
     
      <dl>
        <div class="item">
          <dt><p class="label">hashtag：</p></dt>
          <dd><input type="text" name="hashtag" required></dd>
        </div>
      </dl>

      <dl>
        <div class="item">
          <dt><p class="label">comment：</p></dt>
          <dd><textArea name="text" rows="4" cols="40" required></textArea></dd>
        </div>
      </dl>

      <dl>
        <div class="item">
          <dt><p class="label">photo：</p></dt>
          <dd><input type="file" name="userfile" required></dd>
        </div>
      </dl>

      <div class="btn-area">
      <input type="submit" value="送信"><input type="reset" value="リセット">
      </div>

    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<footer>
  <section>
  <div class="footer2">
      <nav>
          <a href="#top"><img src="top.jpg" alt="" width="50px" height="50px" ></a>  
          <a href="<?=$site_top?>"><img src="plus.jpg" alt="" width="50px" height="50px" ></a>  
      </nav>
  </div>
  </section>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src='../dom-animator.js'></script>
<!-- ネットで見つけた！js 検証ツールで 動くみたいなのだけれど…エラーが… -->

<script type="text/javascript" src="/path/to/rythm.min.js"></script> 
<!-- ネットで見つけた Rythm.js リンクが Not Found に…サービス終了？？ -->

<script src="js/main.js"></script>



</body>
</html>