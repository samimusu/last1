<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>メール送信完了｜メール送信フォーム</title>
</head>
<body>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
/*******************************
 データの受け取り 
*******************************/
$pName		= $_POST["namae"];		//お名前
$pMailaddress	= $_POST["mailaddress"];	//メールアドレス
$pNaiyo		= $_POST["naiyou"];		//お問合せ内容
$mailsousin = "seikou";     //確認用

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
	//エラーメッセージが空ではない場合には、[前のページへ戻る]ボタンを表示する
	echo $errmsg;
	
	//[前のページへ戻る]ボタンを表示する
	echo '<form method="post" action="otoi_ver1.01.php">';
	echo '<input type="hidden" name="namae" value="'.$pName.'">';
	echo '<input type="hidden" name="mailaddress" value="'.$pMailaddress.'">';
	echo '<input type="hidden" name="naiyou" value="'.$pNaiyo.'">';
	echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
	echo '</form>';
} else {
    //DBとの接続を確立
    $dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";
    $dbInfo = new PDO ( $dsn, $user, $password );
    
	//Gmail 認証情報
    $host = 'smtp.gmail.com';
    $username = 's30z.gtr@gmail.com'; // example@gmail.com
    $password = 'jpjuiggxxujdftvp';

    //差出人
    $from = $_POST['mailaddress'];
    $fromname = $_POST['namae'] ;
  
    //宛先
    $to = 's30z.gtr@gmail.com' ;
    $toname = '管理人' ;
  
    //件名・本文
    $subject = 'お問い合わせ' ;
    $body = $_POST['naiyou'];
  
    //メール設定
    //$mail->SMTPDebug = 2; //管理人デバッグ用
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $host;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = "utf-8";
    $mail->Encoding = "base64";
    $mail->setFrom($from, $fromname);
    $mail->addAddress($to, $toname);
    $mail->Subject = $subject;
    $mail->Body    = $body;
  
    //メール送信
    $mail->send();
    echo '成功';
    $seikou = "seikou";


	//メール送信結果
	if($mailsousin == $seikou) {
        echo '<p>お問い合わせメールを送信しました。</p>';
        
		// SQL（挿入）の実行
		$sql = "insert into mail_list(name,address,naiyo) values(:name,:address,:naiyo)";
		$stmt = $dbInfo ->prepare($sql);
		$stmt->bindParam ( ":name", $pName, PDO::PARAM_STR );
		$stmt->bindValue ( ":address", $pMailaddress, PDO::PARAM_INT );
		$stmt->bindParam ( ":naiyo", $pNaiyo, PDO::PARAM_STR );
		$result = $stmt -> execute();
	
		// DBの切断
        $dbInfo = null;
        

	} else {
        echo '<p>メール送信でエラーが発生しました。</p>';
        echo '原因: ', $mail->ErrorInfo;
        echo '<p>下記へ直接ご連絡ください。</p>';
        echo "<p>連絡先：xxx@example.com</p>";
	
		// SQL（挿入）の実行
		$sql = "insert into mail_list(name,address,naiyo) values(:name,:address,:naiyo)";
		$stmt = $dbInfo ->prepare($sql);
		$stmt->bindParam ( ":name", $pName, PDO::PARAM_STR );
		$stmt->bindValue ( ":address", $pMailaddress, PDO::PARAM_INT );
		$stmt->bindParam ( ":naiyo", $pNaiyo, PDO::PARAM_STR );
		$result = $stmt -> execute();
	
		// DBの切断
        $dbInfo = null;
        
        echo $errmsg;
	
        //[前のページへ戻る]ボタンを表示する
        echo '<form method="post" action="otoi_ver1.01.php">';
        echo '<input type="hidden" name="namae" value="'.$pName.'">';
        echo '<input type="hidden" name="mailaddress" value="'.$pMailaddress.'">';
        echo '<input type="hidden" name="naiyou" value="'.$pNaiyo.'">';
        echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
        echo '</form>';
	}
}
?>

</body>
</html>
