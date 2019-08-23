<!-- 今回は、前回の疑問点の修正を探しつつ、JSの公開機能を用いて、アクションをつけようとしたのですが、うまく行ったところと、肝心なところでうまく行ってない状態で、試合終了です。完全に迷走しました。 -->

<?php
//1.  DB接続します xxxにDB名を入れます
// 修正1


// アンダーリンクから、リンク設定
$site_top = "index.php";

try {
$pdo = new PDO('mysql:dbname=saku;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
// 修正2

$stmt = $pdo->prepare("SELECT * FROM saku_table");
$status = $stmt->execute();

//３．データ表示
$view="";

  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
  } else {
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  // 修正3 .$result["id"]で追加できる

    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $enc_img = base64_encode($result["userfile"]);
      try {
        //ここの@マークはエラーを出さないおまじないみたいなものなので一旦気にしないでください！
        $imginfo = @getimagesize('data:application/octet-stream;base64,' . $enc_img);
      } catch(Exception $e) {
        $imginfo = false;
      }
    
    // $sql = "SELECT * FROM `kadai_table`";

    $view .= '<div class="result">';
       $view .= '<div class="sakuimg">';
        if($imginfo){
          $view .= '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'" >';
        }
        $view .="</div>";  
        // どこで使えばいいのかわからず…。以下
        // '<width: 200px; height: 200px; object-fit: cover;>'
        // <img src="search.jpg" alt="" width="50px" height="50px" >
         
        $view .= '<div class="id">';
          // $view .= "<p>";
          // $view .= 'ID:'.$result["id"];
          // $view .= "</p>";
        // $view .="</div>";

        // $view .= '<div class="hashtag">';
          // $view .= "<p>";
          // $view .= 'hashtag:'.$result["hashtag"];
          // $view .= "</p>";
        // $view .="</div>";

        // $view .= '<div class="indate">';
          // $view .= "<p>";
          // $view .= $result["indate"];
          // $view .= "</p>";
        // $view .="</div>";

        // $view .= '<div class="text">';
          $view .= "<p>";
          $view .= $result["text"];
          $view .= "</p>";
        $view .="</div>";

    $view .= "</div>";
    // 上 テキスト関連は、非表示でいいかな…。
    // 修正1.テーブルをばらけさせたい問題。各項目にクラス分けしてみる。変化せず…
//テーブル一体化問題の 仮説＊３．データ表示のview文をばらす！


    // 以下 画像表示CSSがうまくかからないので、文字と、画像のclassを分けられないか
    // 試行錯誤
      // $view .= '<div class="test">';
      // $view .= $result["id"].$result["hashtag"].$result["text"].$result["indate"];
      // $view .= '<div><img src='.$result["userfile"].'></div>';
      // $view .= '</div>';

      // $view2="";
      // header('Content-type: image/jpeg');
      // readfile('userfile');
    //試行錯誤失敗ここまで 

      }
    }

?>

<!-- 動画抗議より、遊びPHP -->
<?php
 $d = date("s"); //秒だけ取得
 if( $d >= 30 ){ echo '<p style="color:red;">あなたはsakusutaguramuを30秒以上見ています。</p>';
 }else{
 echo '<p style="color:blue;">あなたはsakusutaguramuを29秒以下しか見ていません。</p>';
 }echo '<p>現在：'.$d.'秒</p>';
?>


<!-- 以下 HTML -->

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


<body id="main">

  <div class="rythm">
  <!-- //テストジャバ のクラス。どうもサービス終了した模様？Not Found…  -->

    <!-- Head[Start] -->
      <header>
<!-- JSを追加してみる！ -->
          <nav>
            <div class="header">
              <a class="header" href="select.php">
                <h2>Sakstagram</h2></a>
                </div>
          </nav>
      </header>
    <!-- Head[End] -->
  
    <!-- contents[Start] -->

        <section>
        <!-- memo:セクションにもCSSを当ててる。中心化有 -->

          <div class="contents">
              <div class="prof">
                <img src="Photos/IMG_20190311_profile.jpg" width="150px" height="150px" />    
              </div>
              <div id="ex">
                <h2>咲丸。プロフィール<br>クリック</h2>
              </div>
          </div>
          
        </section>

    <!-- 質問！！！PHPの画像のサイズ加工がCSSで効かない！？ -->

    <!-- contents[end] -->
    <!-- Head[End] -->

    <!-- Main[Start] $view-->

      <section>
<!--メモ： どうもうまくいかない！POPUP ボタンを無効化してみる！＝flex-wrap: wrap;が効く！  -->
        
        <!-- <div class="contents2"> -->

          <!-- <label for="popup-on">
            <div class="btn-open"> -->

            <!-- ?=$view?> -->

          <!-- </div> -->

          <!-- </label>   -->

              <!-- <input type="checkbox" id="popup-on">

          <div class="popup">
            
          <label for="popup-on" class="icon-close">×</label>
            
            <div class="popup-content"> -->
            
              <!-- ポップアップの中身 -->
              <!-- [$view] この箇所にphpを埋め込んでいる -->
                <div class="contents2" >
                    <?=$view?>
                <!-- </div> -->
              <!-- ./ポップアップの中身　ここまで -->
                <!-- </div>
            </div>
            <label for="popup-on"></label>
        </div> -->

        <div class="more">
          <button type=button id="more_btn">もっと見る</button>
          <button type=button id="close_btn">表示数を戻す</button>
        </div>
                </div>

      </section>
    <!-- Main[End] -->
    <!-- ポップアップが一枚づつにならず…。
    　　　これは、画像の編集（四角にしたい）にも関連するのかもしれない！？ -->
  </div>

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
  
<script type="text/javascript" src="js/rythm.js">
    // 以下 Rythm.js　 JSのリンクが見つからないと表示に…。
    // サービス終了？？以下 無効。エラーが増えていく…。なぜじゃ？？
    var rythm = new Rythm()
    // // 再生したい音楽ファイルを選択（とりあえず動きだけでも…。）
    rythm.setMusic( '' );
    // // rythm.jsを起動して音楽再生
    rythm.start();
</script> <!-- Vol.2 ネットで見つけた Rythm.js リンクが Not Found に…サービス終了？？ -->
<!-- ギットハブに.jsがあったので、自分のフォルダー内にコピペすれば動くのでは！？というひらめきで作成も、エラーはなくなっても
動作せず。一旦放置 -->

<script type="text/javascript" src='js/dom_animator.js'>
  // ネットで見つけた！js 検証ツールで 動くみたいなのだけれど…エラーが… 
  // 張り方が違うのかな？？ 一旦放置！

    var domAnimator = new DomAnimator();

      var frame1 = ['       .-"-.       ',
                  '     _/.-.-.\\_     ',
                  '    ( ( o o ) )    ',
                  '     |/  "  \\|     ',
                  "      \\'/^\\'/      ",
                  '      /`\\ /`\\      ',
                  '     /  /|\\  \\     ',
                  '    ( (/ T \\) )    ',
                  '     \\__/^\\__/     '];

      var frame2 = ['       .-"-.       ',
                  '     _/_-.-_\\_     ',
                  '    / __> <__ \\    ',
                  '   / //  "  \\\\ \\   ',
                  "  / / \\'---'/ \\ \\  ",
                  '  \\ \\_/`"""`\\_/ /  ',
                  '   \\           /   ',
                  '    \\         /    ',
                  '     |   .   |     ']

      var frame3 = ['       .-"-.       ',
                  '     _/_-.-_\\_     ',
                  '    /|( o o )|\\    ',
                  '   | //  "  \\\\ |   ',
                  "  / / \\'---'/ \\ \\  ",
                  '  \\ \\_/`"""`\\_/ /  ',
                  '   \\           /   ',
                  '    \\         /    ',
                  '     |   .   |     ']

      domAnimator.addFrame(frame1);
      domAnimator.addFrame(frame2);
      domAnimator.addFrame(frame3);
      domAnimator.animate(1000);

</script>　<!-- Vol.1 動かず！！（上記と同じ。）一旦放置 -->


<!-- 第三弾！jQueryでテキストをぶるんってする。これは動いてる感じ。リンクがあるので、対して目立たず！ -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.body').click(function(){
        $(this)
            .animate({'marginLeft':'10px'}, 20)
            .animate({'marginLeft':'-8px'}, 20)
            .animate({'marginLeft':'6px'}, 20)
            .animate({'marginLeft':'-4px'}, 20)
            .animate({'marginLeft':'2px'}, 20)
            .animate({'marginLeft':'-0px'}, 20);
    });
});
</script>


<script src="js/main.js"></script>

  
</body>
</html>
