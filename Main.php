<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
	header("Location: Logout.php");
	exit;
}

?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>メイン</title>
	</head>
	<body>
		<h1>メイン画面</h1>
		<!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
		<p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p>  <!-- ユーザー名をechoで表示 --> <!-- uタグはアンダーバー -->
		<ul>  <!-- ・をのついたものをひとかたまりにまとめる -->
			<li><a href="Logout.php">ログアウト</a></li>  <!-- ・をつける -->
			<li><a href="/last100/1:31_last/html/last_染谷英志.html">パーツ紹介のページ</a></li>
			<li><a href="/last100/1:31_last/html/otoi.php">管理人情報</a></li>
		</ul>
	</body>
</html>
