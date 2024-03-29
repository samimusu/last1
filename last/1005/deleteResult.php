<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["ID"] )) {
	header ( "Location: deleteIndex.php" );
}else{
	// 送信データの取得
	$itemId = $_POST ["ID"];

	// データベースへ接続
	$dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";

	$dbInfo = new PDO ( $dsn, $user, $password );

	// SQL（削除）の実行
	$sql = "DELETE FROM cpu WHERE ID=:itemId";
	$stmt = $dbInfo->prepare ( $sql );
	$stmt->bindParam ( ":itemId", $itemId, PDO::PARAM_INT );
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
	<title>テーブルのデータを削除しよう</title>
	<link rel="stylesheet" type="text/css" href="../css/skyblue.css">
</head>
<body>
<?php
require_once ("header.php");
?>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>削除結果</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong>
			<?php
			if ($result > 0) {
				echo "<div class='color-error'>データを削除しました</div>";
			} else {
				echo "<div class='color-error'>データを削除できませんでした</div>";
			}
			?>
		</strong>
	</div>
</div>
</body>
</html>
