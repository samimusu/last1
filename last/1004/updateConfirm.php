<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["ID"] )) {
	header ( "Location: updateIndex.php" );
}else{
	// 送信データの取得
	$itemId = $_POST ["ID"];

	// データベースへ接続
	$dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";

	$dbInfo = new PDO ( $dsn, $user, $password );

	// SQL（検索）の実行
	$sql = "SELECT * FROM cpu WHERE ID=" . $itemId;
	$result = $dbInfo->query ( $sql );
	$record = $result->fetch ( PDO::FETCH_ASSOC );

	$itemname = $record ["商品名"];
	$price = $record ["価格"];

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
		<strong>データ更新</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong class="color-main">データを変更してください</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<form action="updateResult.php" method="post">
			<table style="width:100%" class="table">
				<thead>
				<tr>
					<th style="width:20%" class="color-main text-center">商品ID</th>
					<th style="width:25%" class="color-main text-center">商品名</th>
					<th style="width:30%" class="color-main text-center">価格</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<?php
					echo "<td><div class='color-main text-right margin-top-10'>" . $itemId . "</div></td>" ;
					echo "<input type='hidden' name='ID' value='" . $itemId . "'>";
					?>
					<td>
						<input style="text-align: right" type="text" name="itemname"
						value="<?php echo $itemname; ?>"  class="form-control">
						</select>
					</td>
					<td>
						<input style="text-align: right" type="text" name="price"
						value="<?php echo $price; ?>"  class="form-control">
					</td>
				</tr>
				<tr>
					<td colspan="4" style="text-align: right">
						<input type="submit" value="更新する" class="btn">
					</td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
</body>
</html>
