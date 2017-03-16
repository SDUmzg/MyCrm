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
$choice="work_plan";
$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
$query1="select * from work_plan where DATE_FORMAT(time,'%m%d') >= DATE_FORMAT(now(),'%m%d') and DATE_FORMAT(time,'%m%d') <= DATE_FORMAT(DATE_ADD(now(), Interval +10 day),'%m%d');";
$result1=$dbh->query($query1);
?>
<table summary="Employee Pay Sheet" id="hor-minimalist-b">
    <thead>
    	<tr>
        	<th scope="col" >客户编号</th>
        	<th scope="col" > </th>
        	<th scope="col" >姓名</th>
        	<th scope="col" > </th>
        	<th scope="col" >身份证号</th>
        	<th scope="col" > </th>
        	<th scope="col" >等级</th>
        	<th scope="col" > </th>
        	<th scope="col" >生日</th>
        	<th scope="col" > </th>
        	<th scope="col" >内容</th>
        	<th scope="col" > </th>
        	<th scope="col" >邮件</th>
        	<th scope="col" > </th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($result1 AS $row1)
{
	$query2="select id from customer_work_plan where plan_number=$row1[0];";
	$result2=$dbh->query($query2);
	foreach ($result2 AS $row2) {
		$query3="select customer_number,name from customer where id=$row2[0]";
		$result3=$dbh->query($query3);
		foreach ($result3 AS $row3) {

			//printf("%s  %s  %s   %s  %s  %s  %s <br/>",$row3["customer_number"],$row3["name"],$row2["id"],$row1[0],$row1[1],$row1[2],"<a href='mail_send.php'>发送邮件</a>");
			echo '<tr>';
			printf("%s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s   <br/>",'<td>',$row3["customer_number"],'<td>','<td>',$row3["name"],'<td>','<td>',$row2["id"],'<td>','<td>',$row1[0],'<td>','<td>',$row1[1],'<td>','<td>',$row1[2],'<td>','<td>',"<a href='mail_send.php'>发送邮件</a>",'<td>');
			echo '<tr>';
		}
	}
}
?>
    </tbody>
</table>