<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CPUクーラー</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/cpu_cooler.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/all.css" />
    <script src="main.js"></script>
</head>
<body>
        <dl>
            <dt><h1>CPUクーラーとは</h1></dt>
            <dd><h3>
                その名の通り、CPUのクーラーである。<br>
                CPUの発熱を、ヒートパイプを伝い,ヒートパシンクにファンの風をあてて放熱する。<br>
                CPUクーラーには、簡易水冷と空冷と二種類ある。<br>
                下の表は水冷と空冷、それぞれの比較表です。
            </h3></dd>
        </dl>
        <table >
            <thead>
                <tr>
                    <th style="width:auto" class="color-main text-center">商品名</th>
                    <th style="width:auto" class="color-main text-center">冷却</th>
                    <th style="width:auto" class="color-main text-center">タイプ</th>
                    <th style="width:auto" class="color-main text-center">サイズ</th>
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
            $sql = "SELECT * FROM cpu_cooler WHERE 1";
    
            // データの数だけ繰り返し
            foreach ( $dbInfo->query ( $sql ) as $record ) {
                echo "<tr>" ;
                echo "<td>" . $record ["商品名"] . "</td>";
                echo "<td>" . $record ["冷却"] . "</td>";
                echo "<td>" . $record ["タイプ"] . "</td>";
                echo "<td>" . $record ["サイズ"] . "</td>";
                echo "<td>" . $record ["価格"] . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    <img src="../images/cpu_cooler.jpg" alt="">
    <p class="line"></p>
    <h4><a href="last_染谷英志.html"> 目次へ戻る</a></h4>
    <li><a href="../../Logout.php">ログアウト</a></li>
</body>
</html>