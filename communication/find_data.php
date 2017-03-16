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
$choice=$_POST["choice"];
$id=$_POST["id"];
if (!empty($id)) {
	$customer_select="customer_".$choice;
	$data_one=$choice."_talk";
	$data_whe=($choice=="mail")?$choice."_number":"pho_number";
	$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
	$query1="select * from $customer_select where  id='$id';";
	$result1=$dbh->query($query1);
	$rowCount=0;
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
	foreach ($result1 AS $row1) {
		$rowCount++;
		$query2="select * from $data_one where $data_whe='$row1[1]' ;";
		$result2=$dbh->query($query2);
		foreach ($result2 AS $row2) {
			//printf("%s  %s  %s  ",$row1[0],$row1[1],$row2[1]);
			//echo "<a href='find_all_data.php' >客户信息</a>","&nbsp&nbsp","<br/>";
			echo '<tr>';
			printf("%s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s  %s <br/>",'<td>',$row1[0],'<td>','<td>',$row1[1],'<td>','<td>',$row2[1],'<td>','<td>',"<a href='find_all_data.php' >客户信息</a>",'<td>');
			echo '<tr>';
			echo "<br/>";
		}
		
	}
	?>
	    </tbody>
</table>
	<?php
	if ($rowCount==0)
        {
            echo "没有该用户的通讯记录 (ㄒoㄒ)//","<br/>";
        }else{
            echo "查询结果",$rowCount,"<br/>";
            session_start();
        	$_SESSION["id"]=$id;
        }
		echo "<a href='find_communication.html' >返回</a>";

}

?>