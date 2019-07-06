<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/mb.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/all.css" />
    <title>マザーボード</title>
</head>
<body>
    <dl>
            <dt><h1>マザーボードとは</h1></dt>
            <dd><h3>
                コンピュータなどで利用される、電子装置を構成するための主要な電子回路基板。<br>
                下記の表は、intel,AMDそれぞれで使えるマザーボードの紹介です。
            </h3></dd>
            </dl>
            <table >
                <thead>
                    <tr>
                        <th style="width:auto" class="color-main text-center">商品名</th>
                        <th style="width:auto" class="color-main text-center">ソケット</th>
                        <th style="width:auto" class="color-main text-center">チップセット</th>
                        <th style="width:auto" class="color-main text-center">フォームファクタ</th>
                        <th style="width:auto" class="color-main text-center">価格</th>
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
                $sql = "SELECT * FROM mb WHERE 1 order by チップメーカー";
        
                // データの数だけ繰り返し
                foreach ( $dbInfo->query ( $sql ) as $record ) {
                    echo "<tr>" ;
                    echo "<td>" . $record ["商品名"] . "</td>";
                    echo "<td>" . $record ["ソケット"] . "</td>";
                    echo "<td>" . $record ["チップセット"] . "</td>";
                    echo "<td>" . $record ["フォームファクタ"] . "</td>";
                    echo "<td>" . $record ["価格"] . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
    <img src="../images/taichi.jpg" >
    <img src="../images/rog.jpg">
    <p class="line"></p>
    <h4><a href="last_染谷英志.html"> 目次へ戻る</a></h4>
    <li><a href="../../Logout.php">ログアウト</a></li>
</body>
</html>