alert("咲く丸のｶﾜ(・∀・)ｲｲ!!画像を見るが良い!")

// 今回の課題について
console.log('test JSはうまく機能してる！が、すいません。授業の所しかうまくできておりません。迷走中…。');
console.log('Jquery のバウンスは機能している模様。sakusutaguramuをクリックすると、移動先で一瞬ゆれる無駄 機能…。');

console.log('JSは WEBサーバーにあるプログラムを自分のサイトに読み込ませるようなイメージで外部ツールをいくつか取り込んだのですが、”先方のサーバーが見つからない”エラーがでます。');
console.log('JS公開のギットハブ内に、.jsや、その他のプログラムの記述があったので、自分のフォルダー内に作成してそれを読み込めば見つかるかと思い変更してみましたが、残念賞。');

// 以下 授業内容

$("#ex").on("click", function(){

    $("#ex").html("<p> 1歳4ヵ月。</p>");
    // 紹介文

    $("#ex").css("color","white");
    // 文字色をwhiteに

    $("#ex").css("text-align","center");
    $("#ex").css("margin","30px");

    $("#ex").css("background-color","#F6275C");
    // バックグランドに背景色を設定

    $("#ex").prepend("<p> 大きな声のいたずらっ子。</p>");
    // 紹介文　頭

    $("#ex").append("<p> お母さん似の丸顔 男の子</p>");
    // 紹介文　末尾

    $("#ex p:odd").css("background-color", "white");
    $("#ex p:odd").css('color','black');
    // 偶数行だけ背景色を白にする

});


        // 動画授業メモ（まだ CLASS 未割り振り）

        // var btn =document.querySelector('#btn');
        // btn.onclick =function(e){
        // alert("クリックイベント＊画像POP UPとかに応用できそう？？")
        // }



        // //対象のclassを定義
        // let item = document.getElementsByClassName('#ex');

        // //クリック時にclassを追加してアニメーション開始
        // item[0].addEventListener('click', () => {
        //   console.log();
        // 　　　　item[0].classList.add('bounce');
        // 　　　　}, false);

        // //アニメーション終了時にclassを削除
        // item[0].addEventListener('animationend', () => {
        // 　　　　item[0].classList.remove('bounce');
        // 　　　　}, false);

// 以下 moreボタンを実装！
// レイアウトの外に出現…。エラーは出ていないが…。
// やはりPHPのテーブルが”全体で 1つのview”（仮説）になっている感じ。
// このテーブルをバラバラにするようラストスパートする。
// 一応 CLASS "sakuimg"（は名前がばらばらなので） ⇒ "id”で反応するよう修正（？）

$(function() {
    // 表示させる要素の総数をlengthメソッドで取得
    // オリジナルの参考サイトは、リンクリストを使用していたため、初回img画像に⇒idの方がいい？と思い修正…
    // 結論 ボタンのみ表示され、 繁栄されてない…。

    //↓オリジナル：var $numberListLen = $("#number_list li").length;
    var $numberListLen = $("#id").length;
    // デフォルトの表示数
    var defaultNum = 6;
    // ボタンクリックで追加表示させる数
    var addNum = 6;
    // 現在の表示数
    var currentNum = 0;
  
    $("#id").each(function() {
      // moreボタンを表示し、closeボタンを隠す
      $(this).find("#more_btn").show();
      $(this).find("#close_btn").hide();
  
      // defaultNumの数だけ要素を表示
      // defaultNumよりインデックスが大きい要素は隠す
      $(this).find("id:not(:lt("+defaultNum+"))").hide();
  
      // 初期表示ではデフォルト値が現在の表示数となる
      currentNum = defaultNum;
  
      // moreボタンがクリックされた時の処理
      $("#more_btn").click(function() {
        // 現在の表示数に追加表示数を加えていく
        currentNum += addNum;
  
        // 現在の表示数に追加表示数を加えた数の要素を表示する
        // メモ今回 liタグないんだよなぁ…。オリジナル： $(this).parent().find("li:lt("+currentNum+")").slideDown();
        $(this).parent().find("id:lt("+currentNum+")").slideDown();
  
        // 表示数の総数よりcurrentNumが多い=全て表示された時の処理
        if($numberListLen <= currentNum) {
          // 現在の表示数をデフォルト表示数へ戻す
          currentNum = defaultNum;
          // インデックス用の値をセット
          indexNum = currentNum - 1;
  
          // moreボタンを隠し、closeボタンを表示する
          $("#more_btn").hide();
          $("#close_btn").show();
  
          // closeボタンがクリックされた時の処理
          $("#close_btn").click(function() {
            // デフォルト数以降=インデックスがindexNumより多い要素は非表示にする
            //オリジナル： $(this).parent().find("li:gt("+indexNum+")").slideUp();
            $(this).parent().find("id:gt("+indexNum+")").slideUp();
  
            // closeボタンを隠し、moreボタンを表示する
            $(this).hide();
            $("#more_btn").show();
          });
        }
      });
    });
  });