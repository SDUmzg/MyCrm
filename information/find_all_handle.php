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
session_start();
$final_choice=$_SESSION["final_choice"];
$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
$query="select * from customer where  $final_choice ;";
$result=$dbh->query($query);
?>
    <table summary="Employee Pay Sheet" id="hor-minimalist-b">
    <thead>
    	<tr>
        	<th scope="col">客户编号</th>
            <th scope="col"> </th>
            <th scope="col">身份证号</th>
            <th scope="col"> </th>
            <th scope="col">姓名</th>
            <th scope="col"> </th>
            <th scope="col">性别</th>
            <th scope="col"> </th>
            <th scope="col">生日</th>
            <th scope="col"> </th>
            <th scope="col">行业</th>
            <th scope="col"> </th>
            <th scope="col">地区</th>
            <th scope="col"> </th>
            <th scope="col">等级</th>
            <th scope="col"> </th>
            <th scope="col">手机号码</th>
            <th scope="col"> </th>
            <th scope="col">邮箱地址</th>
            <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($result AS $row)
{
	echo '<tr>';
	printf("%s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s %s  %s <br/>",'<td>',$row[0],'<td>','<td>',$row[1],'<td>','<td>',$row[2],'<td>','<td>',$row[3],'<td>','<td>',$row[4],'<td>','<td>',$row[5],'<td>','<td>',$row[6],'<td>','<td>',$row[7],'<td>','<td>',$row[8],'<td>','<td>',$row[9],'<td>');
	echo '<tr>';
}
?>
    </tbody>
</table>
<?php
$rowCount=$_SESSION["rowCount"];
echo "查询结果",$rowCount,"<br/>";
echo "<a href='find_information.html' >返回</a>";
?>