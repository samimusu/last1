<?php
require_once ("pencil.php");
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["name"] )) {
	header ( "Location: selectIndex.php" );
} else {
	// 送信データの取得
	$pname = $_POST ["name"];

	// データベースへ接続
	$dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
	$user = "root";
	$password = "";

	$dbInfo = new PDO($dsn,$user,$password);

	// SQL（検索）の実行
	if ($pname == "すべて") {
		$sql = "SELECT * FROM cpu";
	} else {
		$sql = "SELECT * FROM cpu WHERE 商品名 like '%" . $pname . "%'";
	}


	$pencils = new ArrayObject ();


	// データの数だけ繰り返し
	foreach($dbInfo->query ($sql) as $record){
		$name = $record ["商品名"];
		$price = $record ["価格"];
		$clock = $record ["クロック"];
		$core = $record ["コア"];
		$tdp = $record ["TDP"];

		$value = new Pencil ($name, $price, $clock, $core, $tdp);

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
							商品名
						</div>
					</th>
					<th style="width:25%">
						<div class="color-main text-center">
							価格
						</div>
					</th>
					<th style="width:25%">
						<div class="color-main text-center">
							ベース/ブーストクロック
						</div>
					</th>
					<th style="width:25%">
						<div class="color-main text-center">
							コア/スレッド
						</div>
					</th>
					<th style="width:25%">
						<div class="color-main text-center">
							TDP
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
