<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/ssd.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/all.css" />
    <title>Document</title>
</head>
<body>
        <dl>
                <dt><h1>ストレージとは</h1></dt>
                <dd><h3>
                        パソコンのデータを長期間保管しておくための補助記憶装置のこと。<br>
                        例として、HDDやSSDのこと。<br>
                        下記の表は、オススメのHDDとSSDの性能比較表です。
                </h3></dd>
        </dl>
        <table >
            <thead>
                <tr>
                    <th style="width:auto" class="color-main text-center">商品名</th>
                    <th style="width:auto" class="color-main text-center">HDD/SSD</th>
                    <th style="width:auto" class="color-main text-center">容量</th>
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
            $sql = "SELECT * FROM storage WHERE 1 order by 種類";
    
            // データの数だけ繰り返し
            foreach ( $dbInfo->query ( $sql ) as $record ) {
                echo "<tr>" ;
                echo "<td>" . $record ["商品名"] . "</td>";
                echo "<td>" . $record ["種類"] . "</td>";
                echo "<td>" . $record ["容量"] . "</td>";
                echo "<td>" . $record ["価格"] . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <img src="../images/hdd.jpg">
        <img src="../images/ssd_m2.jpg">
        <p class="line"></p>
        <h4><a href="last_染谷英志.html"> 目次へ戻る</a></h4>
        <li><a href="../../Logout.php">ログアウト</a></li>
    </body>
    </html>