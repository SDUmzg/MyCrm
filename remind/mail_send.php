<?php
$to = "1666188122@qq.com";
$subject = "happybirthday";

$message = "
<html>
<head>
	<title>HTML email</title>
</head>
<body>
	<p>This email contains HTML Tags!</p>
	<table>
		<tr>
			<th>Firstname</th>
			<th>Lastname</th>
		</tr>
		<tr>
			<td>John</td>
			<td>Doe</td>
		</tr>
	</table>
</body>
</html>
";

// 当发送 HTML 电子邮件时，请始终设置 content-type
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";

// 更多报头
//$headers .= 'From: <webmaster@example.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

$result=mail($to,$subject,$message,$headers);
var_dump($result);
$result1=mail("test@example.com","This is a subject","This is a mail body");
var_dump($result1);

?>