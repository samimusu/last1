<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["ID"] )) {
	header ( "Location: updateIndex.php" );
}else{
	// 送信データの取得
	$pItemId = $_POST ["ID"];
	$pMaker = $_POST ["itemname"];
	$pPrice = $_POST ["price"];

	// データベースへ接続
	$dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";

	$dbInfo = new PDO ( $dsn, $user, $password );

	// SQL（更新）の実行
	$sql = "UPDATE cpu SET 商品名=:itemname, 価格=:price WHERE ID=:itemId";
	$stmt = $dbInfo->prepare ( $sql );
	$stmt->bindParam ( ":itemname", $pMaker, PDO::PARAM_STR );
	$stmt->bindParam ( ":price", $pPrice, PDO::PARAM_INT );
	$stmt->bindParam ( ":itemId", $pItemId, PDO::PARAM_INT );
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
	<title>テーブルのデータを更新しよう</title>
	<link rel="stylesheet" type="text/css" href="../css/skyblue.css">
</head>
<body>
<?php
require_once ("header.php");
?>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>更新結果</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong>
			<?php
			if ($result > 0) {
				echo "<div style='color:#ff0000'>データを更新しました</div>";
			} else {
				echo "<div style='color:#ff0000'>データを更新できませんでした</div>";
			}
			?>
		</strong>
	</div>
</div>
</body>
</html>
