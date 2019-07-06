<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CPU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/cpu.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/all.css" />
    <script src="main.js"></script>
</head>
<body>
    <dl>
        <dt><h1>CPUとは</h1></dt>
        <dd><h3>
            コンピュータの制御や演算や情報転送をつかさどる中枢部分である。<br>
            出しているメーカーは、intelとAMDがある。<br>
            下の表は、２社が最近出したCPUの性能比較表です。<br>
        </h3></dd>
    </dl>
    <table >
        <thead>
            <tr>
                <th style="width:25%" class="color-main text-center">商品名</th>
                <th style="width:10%" class="color-main text-center">TDP</th>
                <th style="width:auto" class="color-main text-center">ベース/ブーストクロック</th>
                <th style="width:auto" class="color-main text-center">コア/スレッド数</th>
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
        $sql = "SELECT * FROM cpu WHERE 商品名 like '%i%'";

        // データの数だけ繰り返し
        foreach ( $dbInfo->query ( $sql ) as $record ) {
            echo "<tr>" ;
            echo "<td>" . $record ["商品名"] . "</td>";
            echo "<td>" . $record ["TDP"] . "</td>";
            echo "<td>" . $record ["クロック"] . "</td>";
            echo "<td>" . $record ["コア"] . "</td>";
            echo "<td>" . $record ["価格"] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table><img class="intel" src="../images/CPU.jpg" alt=""><br>
    <table >
        <thead>
            <tr>
                <th style="width:25%" class="color-main text-center">商品名</th>
                <th style="width:10%" class="color-main text-center">TDP</th>
                <th style="width:auto" class="color-main text-center">ベース/ブーストクロック</th>
                <th style="width:auto" class="color-main text-center">コア/スレッド数</th>
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
        $sql = "SELECT * FROM cpu WHERE 商品名 like '%ry%'";

        // データの数だけ繰り返し
        foreach ( $dbInfo->query ( $sql ) as $record ) {
            echo "<tr>" ;
            echo "<td>" . $record ["商品名"] . "</td>";
            echo "<td>" . $record ["TDP"] . "</td>";
            echo "<td>" . $record ["クロック"] . "</td>";
            echo "<td>" . $record ["コア"] . "</td>";
            echo "<td>" . $record ["価格"] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
<img class="amd" src="../images/2700x.jpg" alt="">
<p class="line"></p>
<h4><a href="last_染谷英志.html"> 目次へ戻る</a></h4>
<li><a href="../../Logout.php">ログアウト</a></li>
</body>
</html>