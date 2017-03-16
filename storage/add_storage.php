<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加存储</title>
	<link rel="stylesheet" href="../mycss/reset.css">
	<link rel="stylesheet" href="../mytable.css">
</head>
<body>
	<div id="check_customer">
		<form action="" method="get">
			<table>
				<tr>
					<td>
						<select name="storage_choice" id="mystorage_choice">
						<option value="customer_number">客户编号</option>
						<option value="id">身份证号</option>
						<option value="name">姓名</option>
						</select>
						&nbsp:
					</td>
					<td><input type="text" name="mychoice">&nbsp&nbsp&nbsp</td>
					<td><input type="submit" value="核验信息"></td>
				</tr>
			</table>
		</form>
		<hr>
	</div>
</body>
</html>
<?php 
	if (!empty($_GET["mychoice"])) 
	{
		$storage_choice=$_GET["storage_choice"];
		$mychoice=$_GET["mychoice"];
		$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
        $query="select * from customer where  $storage_choice='$mychoice';";
        $result=$dbh->query($query);
        $rowCount=0;
        //echo $query;
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
        	<th scope="col" >计划</th>
        	<th scope="col" > </th>
        	<th scope="col" >记事</th>
        	<th scope="col" > </th>
        	<th scope="col" >日记</th>
        	<th scope="col" > </th>
        	<th scope="col" >文档</th>
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
			//printf("%s  %s  %s  %s	%s	%s	%s <br/>",$mycustomer_number,$myusername,$myid,"<a href='add_time.php?choice=1&customer_number=$mycustomer_number&name=$myusername&id=$myid'>添加工作计划</a>", "<a href='add_time.php?choice=2&customer_number=$mycustomer_number&name=$myusername&id=$myid'>添加记事</a>","<a href='add_time.php?choice=3&customer_number=$mycustomer_number&name=$myusername&id=$myid'>添加日记</a>","<a href='add_time.php?choice=4&customer_number=$mycustomer_number&name=$myusername&id=$myid'>添加文档</a>");
			echo '<tr>';
			printf("%s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s   <br/>",'<td>',$mycustomer_number,'<td>','<td>',$myusername,'<td>','<td>',$myid,'<td>','<td>',"<a href='add_time.php?choice=1&customer_number=$mycustomer_number&name=$myusername&id=$myid'>添加工作计划</a>",'<td>','<td>',"<a href='add_time.php?choice=2&customer_number=$mycustomer_number&name=$myusername&id=$myid'>添加记事</a>",'<td>','<td>',"<a href='add_time.php?choice=3&customer_number=$mycustomer_number&name=$myusername&id=$myid'>添加日记</a>",'<td>','<td>',"<a href='add_time.php?choice=4&customer_number=$mycustomer_number&name=$myusername&id=$myid'>添加文档</a>",'<td>');
			echo '<tr>';
		}
?>

<?php

	} 



?>