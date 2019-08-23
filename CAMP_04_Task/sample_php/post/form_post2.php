<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力確認</title>
</head>
<body>
    

    <?php
    //前のページから name="name（ここが目印）
    //ヒント　name="mail"も送られている
    //データが飛んできているので受け取ります。
    
    $name = $_POST['name']; 

    $kana = $_POST['kana']; 

    $email = $_POST['email']; 

    $textarea = $_POST['textarea']; 

    echo $name; ."br"

    echo $kana; 

    echo $email; 

    echo $textarea; 

    ?>



<h2>入力確認</h2>


<P>  <?php print $name; ?></P>

<P>  <?php print $kana; ?></P>

<P>  <?php print $email; ?></P>

<P>  <?php print $textarea; ?></P>

</body>
</html>
