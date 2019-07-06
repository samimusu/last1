<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>検索</title>
	<link rel="stylesheet" type="text/css" href="../css/skyblue.css">
</head>
<body>
<?php
require_once ("../1003/header.php");
?>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>商品検索</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong class="color-main">検索する商品名を入力してください</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<form action="selectResult.php" method="post">
			<table style="width:100%" class="table">
			<tr>
				<td style="width:30%">
					<div class="color-main text-right margin-top-10">
						<strong>商品名</strong>
					</div>
				</td>
				<td style="width:35%">
					<input type="text" name="name" style="text-align:right" value="" class="form-control">
				</td>
				<td style="width:35%">
					<input type="submit" value="検索する" class="btn">
				</td>
			</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>
