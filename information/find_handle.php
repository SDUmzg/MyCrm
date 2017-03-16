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
	/**测试一下用法
	 * 三目运算   B?x:y         x  true    y  flase
	 * $a="a>3 &nbsp";
	$b="&nbsp b<4";
	$c=$a."and".$b;
	echo "$c";
	var_dump(empty($_GET["username"]));*/
	$customer_number=$_GET["customer_number"];
	$username=$_GET["username"];
	$id=$_GET["id"];
	$final_choice=!empty($_GET["customer_number"])?(!empty($_GET["username"])?(!empty($_GET["id"])?("customer_number='$customer_number' and name='$username' and id='$id'"):("customer_number='$customer_number' and name='$username'")):(!empty($_GET["id"])?("customer_number='$customer_number'  and id='$id'"):("customer_number='$customer_number'"))):(!empty($_GET["username"])?(!empty($_GET["id"])?("name='$username' and id='$id'"):(" name='$username' ")):(!empty($_GET["id"])?("id='$id'"):("")));
    //var_dump(!empty($final_choice));
	//echo $final_choice;
	if(!empty($final_choice))
	{
		$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
		//$query="select * from customer where   $final_choice;";
        $query="select * from customer where  $final_choice ;";
		$rowCount=0;
		//echo $query;
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
			echo '<tr>';
			printf("%s  %s  %s  %s  %s  %s  %s  %s  %s <br/>",'<td>',$mycustomer_number,'<td>','<td>',$myusername,'<td>','<td>',$myid,'<td>');
			echo '<tr>';
		}
?>
    </tbody>
</table>

<?php		
       // var_dump($result);
		//echo "查询结果：",$rowCount;
        if ($rowCount==0)
        {
            echo "没有符合该条件的客户 (ㄒoㄒ)//","<br/>";
        }else{
            echo "查询结果",$rowCount,"<br/>";
            echo "<a href='find_all_handle.php' >详细列表</a>","&nbsp&nbsp";
            session_start();
        	$_SESSION["final_choice"]=$final_choice;
        	$_SESSION["rowCount"]=$rowCount;
        }
		echo "<a href='find_information.html' >返回</a>";
	}else
	{
		echo "没有输入数据，请输入数据 ⊙﹏⊙‖∣⊙﹏⊙‖∣";
		$url="find_information.html";
		echo "<script language='javascript' type=text/javascript>";
		//echo "window.location.href='$url'";
		echo "setTimeout(function(){window.location.href='$url'},1500);";
		echo "</script>";
	}
?>