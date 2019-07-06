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
		<strong>データ追加</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong class="color-main">追加するデータを入力してください</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<form action="insertResult.php" method="post">
			<table style="width:300" class="table">
				<thead>
					<tr>
						<th style="width:30%"  class="color-main text-center">メーカー</th>
						<th  class="color-main text-center">価格</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<input type="text" name="name" style="text-align:right" value="" class="form-control">
						</td>
						<td>
							<input type="text" name="price" style="text-align:right" value="0" class="form-control">
						</td>
						<td>
							<input type="submit" value="追加する" class="btn">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
</body>
</html>
