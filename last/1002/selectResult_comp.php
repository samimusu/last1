<?php
require_once ("pencil.php");

// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["maker"] )) {
	header ( "Location: selectIndex.php" );
} else {
	// 送信データの取得
	$pMaker = $_POST ["maker"];

	// データベースへ接続
	$dsn = "mysql:dbname=stationery;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";

	$dbInfo = new PDO ( $dsn, $user, $password );

	// SQL（検索）の実行
	if ($pMaker == "すべて") {
		$sql = "SELECT * FROM pencils";
	} else {
		$sql = "SELECT * FROM pencils WHERE maker='" . $pMaker . "'";
	}

	$pencils = new ArrayObject ();

	// データの数だけ繰り返し
	foreach ( $dbInfo->query ( $sql ) as $record ) {
		$id = $record ["itemId"];
		$maker = $record ["maker"];
		$hardness = $record ["hardness"];
		$price = $record ["price"];
		$value = new Pencil ( $id, $maker, $hardness, $price );

		// 配列に追加
		$pencils->append ( $value );
	}

	// データベースの切断
	$dbInfo = null;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>テーブルからデータを検索して表示しよう</title>
	<link rel="stylesheet" type="text/css" href="../css/skyblue.css">
</head>
<body>
<?php
require_once ("header.php");
?>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>検索結果</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<table style="width:100%" class="table table-striped table-bordered" >
			<thead>
				<tr>
					<th style="width:25%">
						<div class="color-main text-center">
							商品ID
						</div>
					</th>
					<th style="width:25%">
						<div class="color-main text-center">
							商品名
						</div>
					</th>
					<th style="width:25%">
						<div class="color-main text-center">
							硬度
						</div>
					</th>
					<th style="width:25%">
						<div class="color-main text-center">
							価格
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ( $pencils as $pencil ) {
				$pencil->printData ();
			}
			?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>
