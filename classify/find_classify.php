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
$grade_level=$_GET["grade_level"];
$industry=$_GET["industry"];
$area=$_GET["area"];
$sex=$_GET["sex"];
$final_choice=!empty($_GET["grade_level"])?(!empty($_GET["industry"])?(!empty($_GET["area"])?(!empty($_GET["sex"])?("grade_level='$grade_level' and industry='$industry' and area='$area' and sex='$sex'"):("grade_level='$grade_level' and industry='$industry' and area='$area'")):(!empty($_GET["sex"])?("grade_level='$grade_level' and industry='$industry' and  sex='$sex'"):("grade_level='$grade_level' and industry='$industry'"))):(!empty($_GET["area"])?(!empty($_GET["sex"])?("grade_level='$grade_level' and  area='$area' and sex='$sex'"):("grade_level='$grade_level'  and area='$area'")):(!empty($_GET["sex"])?("grade_level='$grade_level' and  sex='$sex'"):("grade_level='$grade_level' ")))):(!empty($_GET["industry"])?(!empty($_GET["area"])?(!empty($_GET["sex"])?("industry='$industry' and area='$area' and sex='$sex'"):("industry='$industry' and area='$area'")):(!empty($_GET["sex"])?("industry='$industry' and  sex='$sex'"):("industry='$industry'"))):(!empty($_GET["area"])?(!empty($_GET["sex"])?("area='$area' and sex='$sex'"):("area='$area' ")):(!empty($_GET["sex"])?(" sex='$sex'"):(""))));
//echo "$final_choice";
$query=!empty($final_choice)?"select * from customer where  $final_choice ;":"select * from customer;";
$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
//$query="select * from customer where  $final_choice ;";
$rowCount=0;
$result=$dbh->query($query);
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
        </tr>
    </thead>
    <tbody>
<?php
foreach ($result AS $row)
	{
		$rowCount++;
		$mycustomer_number=$row['customer_number'];
		$myusername=$row['name'];
		$myid=$row['id'];
		//printf("%s  %s  %s  <br/>",$mycustomer_number,$myusername,$myid);
		echo '<tr>';
		printf("%s  %s  %s  %s  %s  %s  %s  %s  %s <br/>",'<td>',$mycustomer_number,'<td>','<td>',$myusername,'<td>','<td>',$myid,'<td>');
		echo '<tr>';
	}
?>
    </tbody>
</table>
<?php
if ($rowCount==0)
    {
        echo "没有符合该条件的客户 (ㄒoㄒ)//","<br/>";
    }else{
        echo "查询结果",$rowCount,"<br/>";
    }
        echo "<a href='classify.html' >返回</a>";
?>    