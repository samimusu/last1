<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>テーブルのデータを更新しよう</title>
	<link rel="stylesheet" type="text/css" href="../css/skyblue.css">
</head>
<body>
<?php
require_once ("../1003/header.php");
?>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>データ更新</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<table style="width:100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:25%" class="color-main text-center">商品ID</th>
					<th style="width:25%" class="color-main text-center">商品名</th>
					<th style="width:25%" class="color-main text-center">価格</th>
				</tr>
			</thead>
			<tbody>
			<?php
			// データベースへ接続
			$dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
			$user = "root";
			$password = "";

			$dbInfo = new PDO ( $dsn, $user, $password );

			// SQL（検索）の実行
			$sql = "SELECT * FROM cpu";

			// データの数だけ繰り返し
			foreach ( $dbInfo->query ( $sql ) as $record ) {
				echo "<tr>" ;
				echo "<td>" . $record ["ID"] . "</td>";
				echo "<td>" . $record ["商品名"] . "</td>";
				echo "<td>" . $record ["価格"] . "</td>";
				echo "</tr>";
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong class="color-main">更新する商品IDを選択してください</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<form action="updateConfirm.php" method="post">
			<table style="width:25%" class="table">
				<tr>
					<td>
						<select name="ID" class="form-control">
						<?php
						foreach ( $dbInfo->query ( $sql ) as $record ) {
							echo "<option value='" . $record ["ID"] . "'>";
							echo $record ["ID"] . "</option>";
						}
						// データベースの切断
						$dbInfo = null;
						?>
						</select>
					</td>
					<td><input type="submit" value="更新する" class="btn"></td>
				</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>
