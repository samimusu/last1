<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>入力内容の確認｜メール送信フォーム</title>
</head>
<body>

<?php
/* データの受け取り */

$pName = $_POST["namae"]; //お名前
$pMailaddress = $_POST["mailaddress"]; //メールアドレス
$pNaiyo = $_POST["naiyou"]; //お問合せ内容

//危険な文字列を入力された場合にそのまま利用しない対策
$pName	= htmlspecialchars($pName, ENT_QUOTES);
$pMailaddress	= htmlspecialchars($pMailaddress, ENT_QUOTES);
$pNaiyo	= htmlspecialchars($pNaiyo, ENT_QUOTES);

/*******************************
 未入力チェック
*******************************/
$errmsg = '';	//エラーメッセージを空にしておく
if ($pName == '') {
	$errmsg = $errmsg.'<p>お名前が入力されていません。</p>';
}
if ($pMailaddress == '') {
	$errmsg = $errmsg.'<p>メールアドレスが入力されていません。</p>';
}
if ($pNaiyo == '') {
	$errmsg = $errmsg.'<p>お問合せ内容が入力されていません。</p>';
}

/*******************************
 入力内容の確認
*******************************/
if ($errmsg != '') {
	//エラーメッセージが空ではない場合には、エラーメッセージを表示する
    echo $errmsg;
    	//[前のページへ戻る]ボタンを表示する
	echo '<form method="post" action="otoi_ver1.01.php">';
	echo '<input type="hidden" name="namae" value="'.$pName.'">';
	echo '<input type="hidden" name="mailaddress" value="'.$pMailaddress.'">';
	echo '<input type="hidden" name="naiyou" value="'.$pNaiyo.'">';
	echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
	echo '</form>';
} else {
	//エラーメッセージが空の場合には、入力された内容を画面表示する
	echo '<h3>入力内容を確認します</h3>';
	echo '<dl>';
	echo '<dt>【お名前】</dt><dd>'.$pName.'</dd>';
	echo '<dt>【メールアドレス】</dt><dd>'.$pMailaddress.'</dd>';
	echo '<dt>【お問合せ内容】</dt><dd>'.$pNaiyo.'</dd>';
    echo '</dl>';
    
    //[上記内容で送信する]ボタンを表示する
	echo '<form method="post" action="mailtolist_ver1.01.php">';
	echo '<input type="hidden" name="namae" value="'.$pName.'">';
	echo '<input type="hidden" name="mailaddress" value="'.$pMailaddress.'">';
	echo '<input type="hidden" name="naiyou" value="'.$pNaiyo.'">';
	echo '<input type="submit" name="okbtn" value="上記内容で送信する">';
	echo '</form>';
}
?>

</body>
</html>