<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>メール送信完了｜メール送信フォーム</title>
</head>
<body>

<?php
/*******************************
 データの受け取り
*******************************/
$pName		= $_POST["namae"];		//お名前
$pMailaddress	= $_POST["mailaddress"];	//メールアドレス
$pNaiyo		= $_POST["naiyou"];		//お問合せ内容

//危険な文字列を入力された場合にそのまま利用しない対策
$pName		= htmlspecialchars($pName, ENT_QUOTES);
$pMailaddress	= htmlspecialchars($pMailaddress, ENT_QUOTES);
$pNaiyo		= htmlspecialchars($pNaiyo, ENT_QUOTES);

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
 メール送信の実行
*******************************/
if ($errmsg != '') {
	//エラーメッセージが空ではない場合には、エラーメッセージを表示する
	echo $errmsg;
	
	//[前のページへ戻る]ボタンを表示する
	echo '<form method="post" action="index.php">';
	echo '<input type="hidden" name="namae" value="'.$pName.'">';
	echo '<input type="hidden" name="mailaddress" value="'.$pMailaddress.'">';
	echo '<input type="hidden" name="naiyou" value="'.$pNaiyo.'">';
	echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
	echo '</form>';
} else {
	//エラーメッセージが空の場合には、メール送信処理を実行する
	//メール本文の作成
	$honbun = '';
	$honbun .= "メールフォームよりお問い合わせがありました。\n\n";
	$honbun .= "【お名前】\n";
	$honbun .= $pName."\n\n";
	$honbun .= "【メールアドレス】\n";
	$honbun .= $pMailaddress."\n\n";
	$honbun .= "【お問い合わせ内容】\n";
	$honbun .= $pNaiyo."\n\n";
	
	//エンコード処理
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	//メールの作成
	$to	= "s30z.gtr@gmail.com";			//送信先メールアドレス
	$subject	= "メールフォームよりお問い合わせ";	//メールの件名
	$body	= $honbun;				//メールの本文
	$headers	= "from:".$pMailaddress;			//送信元として表示されるメールアドレス
	
	//メール送信処理
	$mailsousin	= mb_send_mail($to, $subject, $body, $headers);
    
	//メール送信結果
	if($mailsousin == true) {
		echo '<p>お問い合わせメールを送信しました。</p>';
	} else {
		echo '<p>メール送信でエラーが発生しました。</p>';
	}
}
?>

</body>
</html>