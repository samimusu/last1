<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/gpu.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/all.css" />
    <title>Document</title>
</head>
<body>
    <dl>
        <dt><h1>グラフィックボードとは</h1></dt>
            <dd><h3>
                    ディスプレイに画像を綺麗に出力するための部品。<br>
                    使用用途は、３DゲームやCADソフトなどの、重い処理をさせること。<br>
                    グラフィックボードは、NVIDIAとAMDが発売している。<br>
                    下記の表は、各社おすすめのグラフィックボードを紹介しています。<br>
            </h3></dd>
    </dl>
    
    <table >
        <thead>
            <tr>
                <th style="width:auto" class="color-main text-center">商品名</th>
                <th style="width:auto" class="color-main text-center">搭載チップ</th>
                <th style="width:auto" class="color-main text-center">VRAM</th>
                <th style="width:auto" class="color-main text-center">バスインターフェイス</th>
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
        $sql = "SELECT * FROM gpu WHERE 1 ";

        // データの数だけ繰り返し
        foreach ( $dbInfo->query ( $sql ) as $record ) {
            echo "<tr>" ;
            echo "<td>" . $record ["商品名"] . "</td>";
            echo "<td>" . $record ["チップ"] . "</td>";
            echo "<td>" . $record ["VRAM"] . "</td>";
            echo "<td>" . $record ["インターフェイス"] . "</td>";
            echo "<td>" . $record ["価格"] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <img src="../images/gpu.jpg" alt="">
    <img src="../images/amd_gpu.jpg" alt="">
    <p class="line"></p>
    <h4><a href="last_染谷英志.html"> 目次へ戻る</a></h4>
    <li><a href="../../Logout.php">ログアウト</a></li>
</body>
</html>