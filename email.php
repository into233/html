<?php

require_once('Mail.php');
require_once('Mail/mime.php');
require_once('Net/SMTP.php');

$smtpinfo = array();
$smtpinfo["host"] = "smtp.sina.com.cn";
$smtpinfo["port"] = "25";
$smtpinfo["username"] = "slomovbus";
$smtpinfo["password"] = "mmdyddc...."; //发件人邮箱密码
$smtpinfo["timeout"] = 10; //网络超时时间，秒
$smtpinfo["auth"] = true; //登录验证

$mailAddr = array('1127174216@qq.com');
// 发件人显示信息
// $from = "Name <1127174216@qq.com>";
$from = "slomovbus@sina.com";//
// 收件人显示信息
$to = implode(',', $mailAddr);
// 邮件标题
$subject = "ch945验证码";
// 邮件正文
$content = "<h3>验证码:</h3>18998,请勿将次验证码告予他人.慎重";
// 邮件正文类型，格式和编码
$contentType = "text/html; charset=utf-8";
//换行符号 Linux: \n Windows: \r\n
$crlf = "\n";
$mime = new Mail_mime($crlf);
$mime->setHTMLBody($content);
$param['text_charset'] = 'utf-8';
$param['html_charset'] = 'utf-8';
$param['head_charset'] = 'utf-8';
$body = $mime->get($param);
$headers = array();
$headers["From"] = $from;
$headers["To"] = $to;
$headers["Subject"] = $subject;
$headers["Content-Type"] = $contentType;
$headers = $mime->headers($headers);
$smtp =& Mail::factory("smtp", $smtpinfo);
$mail = $smtp->send($mailAddr, $headers, $body);
$smtp->disconnect();
if (PEAR::isError($mail)) {
    //发送失败
    echo 'Email sending failed: ' . $mail->getMessage() . "\n";
} else {
    //发送成功
    echo "success!\n";
}
?>