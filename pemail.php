<?php    
require("phpmailer/class.phpmailer.php");    
function smtp_mail( $sendto_email, $subject, $body, $extra_hdrs, $user_name){    
    $mail = new PHPMailer();    
    $mail->IsSMTP();                  // send via SMTP    
    $mail->Host = "smtp.sina.com.cn";   // SMTP servers    
    $mail->SMTPAuth = true;           // turn on SMTP authentication    
    $mail->Username = "slomovbus";     // SMTP username  注意：普通邮件认证不需要加 @域名  这里是我的163邮箱
    $mail->Password = "password"; // SMTP password    在这里输入邮箱的密码
    $mail->From = "xuchao842363331@163.com";      // 发件人邮箱    
    $mail->FromName =  "管理员";  // 发件人    
  
    $mail->CharSet = "UTF-8";   // 这里指定字符集！    指定UTF-8后邮件的标题和发件人等等不会乱码，如果是GB2312标题会乱码
    $mail->Encoding = "base64";    
    $mail->AddAddress($sendto_email,"username");  // 收件人邮箱和姓名    
    $mail->AddReplyTo("yourmail@yourdomain.com","yourdomain.com");    
    //$mail->WordWrap = 50; // set word wrap 换行字数    
    //$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment 附件    
    //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    
    //$mail->IsHTML(true);  // send as HTML    
    // 邮件主题    
    $mail->Subject = $subject;    
    // 邮件内容    
    $mail->Body = "hello！PHPMailer";                                                                          
    //$mail->AltBody ="text/html";    
    if(!$mail->Send())    
    {    
        echo "error <p>";    
        echo "error: " . $mail->ErrorInfo;    
        exit;    
    }    
    else {    
        echo"success!"; 
    }    
}    
// 参数说明(发送到, 邮件主题, 邮件内容, 附加信息, 用户名)      
?>  
