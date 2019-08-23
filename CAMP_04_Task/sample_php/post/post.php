<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力フォーム</title>
</head>
<body>

    <!-- http://localhost/CAMP_03/CAMP_03/sample_php/post/post.php -->
    <!-- formと入力するとエメットが出現！post or get -->

    <h1>入力フォーム</h1>

    <!-- アクションがないと次に行かない！action　受け取り先が必須　 -->
    <form action="next.php" method="post">
    

    <!-- いろんなinputo を調べよう！ 
    参考URL：http://www.htmq.com/html5/input.shtml-->
    <!-- name は なんでもOK! ラベル 的な扱い！ -->
    <p>お名前:<input type="text" name="name" size="20"></p>

    <p>カナ:<input type="text" name="kana" size="20"></p>

    <p>電話:<input type="text" name="tel" size="20"></p>

    <p>MAIL:<input type="text" name="email" size="20"></p>

    <p>参考サイトurl:<input type="text" name="url" size="20"></p>

    <label>生年月日:<input type="datetime-local" name="datetime-local"></label>
    <!-- （type="datetime-local"） -->

    <P>ご質問：</P><textarea class="ditail" name="textarea" id="" cols="30" rows="10"></textarea>

    <p>パスワード:<input type="text" name="password" size="20"></p>

    <label>このサイトはわかりやすかったですか？:<input type="range" name="range"></label>
    <!-- （type="range"） -->

    <!--input type="submit" 　送信の必須ボタン！  -->
    <p><input type="submit" value="送信"><input type="reset" value="リセット"><p>



    </form>

</body>
</html>