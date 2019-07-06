<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["name"] )) {
	header ( "Location: insertIndex.php" );
}else{
	// 送信データの取得
	$pName = $_POST ["name"];
	$pPrice = $_POST ["price"];

	// データベースへ接続
	$dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";

	$dbInfo = new PDO ( $dsn, $user, $password );

	// SQL（挿入）の実行
	$sql = "insert into cpu(商品名,価格) values(:name,:price)";
	$stmt = $dbInfo ->prepare($sql);
	$stmt->bindParam ( ":name", $pName, PDO::PARAM_STR );
	$stmt->bindValue ( ":price", $pPrice, PDO::PARAM_INT );
	$result = $stmt -> execute();

	// データベースの切断
	$dbInfo = null;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>テーブルにデータを追加しよう</title>
	<link rel="stylesheet" type="text/css" href="../css/skyblue.css">
</head>
<body>
<?php
require_once ("header.php");
?>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>追加結果</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong>
			<?php
			if ($result > 0) {
				echo "<div style='color:#ff0000'>データを追加しました</div>";
			} else {
				echo "<div style='color:#ff0000'>データを追加できませんでした</div>";
			}
			?>
		</strong>
	</div>
</div>
</body>
</html>
