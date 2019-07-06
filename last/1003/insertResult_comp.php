<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["maker"] )) {
	header ( "Location: insertIndex.php" );
}else{
	// 送信データの取得
	$pMaker = $_POST ["maker"];
	$pHardness = $_POST ["hardness"];
	$pPrice = $_POST ["price"];

	// データベースへ接続
	$dsn = "mysql:dbname=stationery;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";

	$dbInfo = new PDO ( $dsn, $user, $password );

	// SQL（挿入）の実行
	$sql = "INSERT INTO pencils(maker, hardness, price) VALUES (:maker, :hardness, :price)";
	$stmt = $dbInfo->prepare ( $sql );
	$stmt->bindParam ( ":maker", $pMaker, PDO::PARAM_STR );
	$stmt->bindParam ( ":hardness", $pHardness, PDO::PARAM_STR );
	$stmt->bindParam ( ":price", $pPrice, PDO::PARAM_INT );
	$stmt->execute ();
	
	// 更新行の取得
	$result = $stmt->rowCount ();

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
