<!DOCTYPE html>
<html>
    <head>
        <title>お問い合わせ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/otoi.css"/>
    </head>
    <body>
    <?php
/*******************************
 確認ページから戻ってきた場合のデータの受け取り 
*******************************/
if (isset($_POST["backbtn"])) {
	//確認ページ（confirm.php）から戻ってきた場合にはデータを受け取る
	$pName		= $_POST["namae"];		//お名前
	$pMailaddress	= $_POST["mailaddress"];	//メールアドレス
	$pNaiyo		= $_POST["naiyou"];		//お問合せ内容

	//危険な文字列を入力された場合にそのまま利用しない対策
	$pName		= htmlspecialchars($pName, ENT_QUOTES);
	$pMailaddress	= htmlspecialchars($pMailaddress, ENT_QUOTES);
	$pNaiyo		= htmlspecialchars($pNaiyo, ENT_QUOTES);
} else {
	//確認ページから戻ってきた場合でなければ、変数の値は必ず空となる
	$pName		= '';				//お名前
	$pMailaddress	= '';				//メールアドレス
	$pNaiyo		= '';				//お問合せ内容
}
?>
    <fieldset class="kanri">
        <legend>管理人情報</legend>
            <p>氏名：染谷英志</p>
            <p>職業：学生</p>
            <p>年齢：２０歳</p>
        <a href="https://www.facebook.com/profile.php?id=100004107166199">Facebookはこちら</a><br>
        <img class="eiji" src="../images/DSCPDC_0001_BURST20190124130316476_COVER.JPG" alt="">
    </fieldset>
    <fieldset class="otoi">
        <legend>お問い合わせフォーム</legend>
        <form method="post" action="confilm_ver1_01.php">
            <p><label>氏名:
                <input type="text" maxlength="255" name="namae" value="<?=$pName?>">
            </label></p>
            <label>お問い合わせ内容<br>
                <textarea class="bun" maxlength="250" name="naiyou" placeholder="お問合せ内容の入力"><?=$pNaiyo?></textarea>

            </label>
            <br>
        <fieldset>
            <legend>追加情報</legend>
            <p>お得な情報や、ここだけの情報をお送りしたいと思っていますので、ぜひ登録をお願いいたします。</p>
            <p>メールアドレス:
                <input type="text" name="mailaddress" value="<?=$pMailaddress?>">
            </p>
        </fieldset>
            <input type="submit" name="btn" value="送信">
            </form>
        </fieldset>
    </body>
</html>