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
	if ($_GET["storage_choice"]=="id"&&!empty($_GET["mychoice"])) {
		//选择了身份证查询
		$mychoice=$_GET["mychoice"];
		$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
		$query1="select * from customer_document where  id='$mychoice' ;";
		$rowCount=0;
		$result1=$dbh->query($query1);
?>
    <table summary="Employee Pay Sheet" id="hor-minimalist-b">
    <thead>
    	<tr>
        	<th scope="col" >身份证号</th>
        	<th scope="col" > </th>
        	<th scope="col" >文档编号</th>
        	<th scope="col" > </th>
        	<th scope="col" >储存路径</th>
        	<th scope="col" > </th>
        	<th scope="col" >备注</th>
        	<th scope="col" > </th>
        </tr>
    </thead>
    <tbody>
<?php
		foreach ($result1 AS $row1)
		{
			$rowCount++;
			$doc_number=$row1["doc_number"];
			$query2="select * from document where  doc_number='$doc_number' ;";
			$result2=$dbh->query($query2);
			foreach ($result2 AS $row2)
			{
				//printf("%s  %s  %s %s  <br/>",$row1[0],$row1[1],$row2[1],$row2[2]);
				echo '<tr>';
				printf("%s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s <br/>",'<td>',$row1[0],'<td>','<td>',$row1[1],'<td>','<td>',$row2[1],'<td>','<td>',$row2[2],'<td>');
				echo '<tr>';
			}
		}
		if ($rowCount==0)
        {
            echo "没有符合该条件的客户 (ㄒoㄒ)//","<br/>";
        }else{
            echo "查询结果",$rowCount,"<br/>";
        }
		echo "<a href='find_storage.html' >返回</a>";
	}else if ($_GET["storage_choice"]=="doc_name"&&!empty($_GET["mychoice"])){
		//选择了文件名查询
		$doc_path="../myfile/".$_GET["mychoice"];
		$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
		$query1="select * from document where doc_path='$doc_path';";
		$result1=$dbh->query($query1);
		foreach ($result1 AS $row1)
		{
			$doc_number=$row1["doc_number"];
			$query2="select * from customer_document where  doc_number='$doc_number' ;";
			$result2=$dbh->query($query2);
			foreach ($result2 AS $row2)
			{
				//printf("%s  %s  %s %s  <br/>",$row2[0],$row2[1],$row1[1],$row1[2]);
				echo '<tr>';
				printf("%s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s <br/>",'<td>',$row2[0],'<td>','<td>',$row2[1],'<td>','<td>',$row1[1],'<td>','<td>',$row1[2],'<td>');
				echo '<tr>';
			}
		}
?>
    </tbody>
</table>
<?php
		echo "<a href='find_storage.html' >返回</a>"; 
	}else{
		echo "请输入查询数据";
 		$url="find_storage.html";
 		echo "<script language='javascript' type=text/javascript>";
 		echo "setTimeout(function(){window.location.href='$url'},1500);";
 		echo "</script>";
	}


?>