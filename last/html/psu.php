<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/psu.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/all.css" />
    <title>Document</title>
</head>
<body>
    <dl>
            <dt><h1>PSUとは</h1></dt>
            <dd><h3>
                    PSU(電源ユニット)とは、デスクトップ型やタワー型のパソコンで、筐体内部の隅に装着されている箱型の電力供給装置。<br>
                    家庭用の交流電源から受電し、直流に変換して各部品に供給する役割を果たす。<br>
                    下の表は、容量が高くなく低くもないちょうどいいくらいの電源の紹介です。<br>
            </h3></dd>
    </dl>
    <table >
        <thead>
            <tr>
                <th style="width:auto" class="color-main text-center">商品名</th>
                <th style="width:auto" class="color-main text-center">電源容量</th>
                <th style="width:auto" class="color-main text-center">80PLUS認証</th>
                <th style="width:auto" class="color-main text-center">対応規格</th>
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
        $sql = "SELECT * FROM psu WHERE 1 ";

        // データの数だけ繰り返し
        foreach ( $dbInfo->query ( $sql ) as $record ) {
            echo "<tr>" ;
            echo "<td>" . $record ["商品名"] . "</td>";
            echo "<td>" . $record ["容量"] . "</td>";
            echo "<td>" . $record ["80plus"] . "</td>";
            echo "<td>" . $record ["規格"] . "</td>";
            echo "<td>" . $record ["価格"] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table><br>
            <img  src="../images/PSU.jpg" alt="[写真]" class="psu">
            <p class="line"></p>
        <h4><a href="last_染谷英志.html"> 目次へ戻る</a></h4>
        <li><a href="../../Logout.php">ログアウト</a></li>
</body>
</html>