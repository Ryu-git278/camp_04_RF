<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>フォーム：POST</title>
</head>
<body>

  <form method="post" action="form_post2.php">

      <p>お名前:<input type="text" name="name" size="20"></p>

      <p>カナ:<input type="text" name="kana" size="20"></p>

      <p>電話:<input type="text" name="tel" size="20"></p>

      <p>MAIL:<input type="text" name="email" size="20"></p>

      <p>参考サイトurl:<input type="text" name="url" size="20"></p>

      <p>生年月日</p>
      <p>月:<input type="text" name="month" size="20"></p>

      <p>日:<input type="text" name="date" size="20"></p>


      <P>ご質問：</P><textarea class="ditail" name="textarea" id="" cols="30" rows="10"></textarea>

      <p>パスワード:<input type="text" name="password" size="20"></p>

      <p><input type="submit" value="送信"><input type="reset" value="リセット"><p>

  </form>

</body>
</html>
