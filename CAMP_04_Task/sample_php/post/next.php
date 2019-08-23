<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力確認</title>
</head>
<body>


<?php
    
// 演習！

    $name = $_POST['name']; 

    $kana = $_POST['kana']; 

    $tel = $_POST['tel']; 
    
    $email = $_POST['email']; 

    $url = $_POST['url']; 

    $datetimelocal =$_POST['datetime-local'];
    
    $textarea = $_POST['textarea']; 


    $password = $_POST['password']; 

    $range = $_POST['range']; 

    // .'<br>';で htmlタグを入れられる！！

    echo $name.'<br>';

    echo $kana.'<br>';

    echo $tel.'<br>';

    echo $email.'<br>';

    echo $url.'<br>';

    echo $datetimelocal.'<br>';

    echo $textarea.'<br>';

    echo $password.'<br>';

    echo $range.'<p>%</p>';

    ?>



<h2>入力確認</h2>


<P>  <?php print $name; ?></P>

<P>  <?php print $kana; ?></P>

<P>  <?php print $tel; ?></P>

<P>  <?php print $email; ?></P>


<P>  <?php print $url; ?></P>

<P>  <?php print $datetimelocal; ?></P>

<P>  <?php print $textarea; ?></P>

<P>  <?php print $password; ?></P>

<P>  <?php print $range; ?> %</P>



</body>
</html>

</body>
</html>