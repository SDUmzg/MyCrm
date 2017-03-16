<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../mycss/reset.css">
	<link rel="stylesheet" href="../mytable.css">
</head>
<body>
	
</body>
</html>
<?php 
header('Content-Type:text/html;charset=utf-8');
$choice="birthday";
echo "即将在十天以内过生日的客户：","<br/>";
$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
$query="select * from customer where DATE_FORMAT(birthday,'%m%d') >= DATE_FORMAT(now(),'%m%d') and DATE_FORMAT(birthday,'%m%d') <= DATE_FORMAT(DATE_ADD(now(), Interval +10 day),'%m%d');";
$result=$dbh->query($query);
?>
    <table summary="Employee Pay Sheet" id="hor-minimalist-b">
    <thead>
    	<tr>
        	<th scope="col" >客户编号</th>
        	<th scope="col" > </th>
        	<th scope="col" >身份证号</th>
        	<th scope="col" > </th>
        	<th scope="col" >姓名</th>
        	<th scope="col" > </th>
        	<th scope="col" >性别</th>
        	<th scope="col" > </th>
        	<th scope="col" >生日</th>
        	<th scope="col" > </th>
        	<th scope="col" >选项</th>
        	<th scope="col" > </th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($result AS $row)
{
	//printf("%s  %s  %s  %s  %s  %s <br/>",$row[0],$row[1],$row[2],$row[3],$row[4],"<a href='mail_send.php'>发送邮件</a>");
	echo '<tr>';
	printf("%s  %s  %s  %s  %s  %s  %s  %s  %s %s  %s  %s   %s  %s  %s %s  %s  %s<br/>",'<td>',$row[0],'<td>','<td>',$row[1],'<td>','<td>',$row[2],'<td>','<td>',$row[3],'<td>','<td>',$row[4],'<td>','<td>',"<a href='mail_send.php'>发送邮件</a>",'<td>');
	echo '<tr>';
}
?>
    </tbody>
</table>