<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
  <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    $mail = new PHPMailer(true);
    
    try {
      //Gmail 認証情報
      $host = 'smtp.gmail.com';
      $username = 's30z.gtr@gmail.com'; // example@gmail.com
      $password = 'jpjuiggxxujdftvp';

      //差出人
      $from = $_POST['from'];
      $fromname = $_POST['fromname'];
    
      //宛先
      $to = $_POST['to'];
      $toname = $_POST['toname'];
    
      //件名・本文
      $subject = $_POST['title'];;
      $body = $_POST['content'];
    
      //メール設定
      $mail->SMTPDebug = 2; //デバッグ用
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->Host = $host;
      $mail->Username = $username;
      $mail->Password = $password;
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      $mail->CharSet = "utf-8";
      $mail->Encoding = "base64";
      $mail->setFrom($from, $fromname);
      $mail->addAddress($to, $toname);
      $mail->Subject = $subject;
      $mail->Body    = $body;
    
      //メール送信
      $mail->send();
      echo '成功';
    
    } catch (Exception $e) {
      echo '失敗: ', $mail->ErrorInfo;
    }
    ?>
  </body>
</html>

