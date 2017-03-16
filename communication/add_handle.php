<?php 
header('Content-Type:text/html;charset=utf-8');
$choice=$_POST["choice"];
$id=$_POST["id"];
$data_one=$choice."_talk";
if (!empty($id)) {
	$time=date('Y-m-d H:i:s',$_SERVER["REQUEST_TIME"]);
	$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
	$query1="insert into $data_one values(null,'$time');";
	$affected1=$dbh->exec($query1);
	if ($affected1==1) {
	$lastid="select last_insert_id();";
	$customer_insert="customer_".$choice;
	$mynumber=$choice."_number";
	$result=$dbh->query($lastid);
	foreach ($result AS $row)
		{
			$insert_number=$row[0];
			$query2="insert $customer_insert values('$id','$insert_number');";
			$affected2=$dbh->exec($query2);
		}


}
$mystuation=($affected1==1&&$affected2==1)?"添加成功  o(≧v≦)o~~好棒":"添加失败   (￣▽￣＃) = ﹏﹏";
 echo "$mystuation";
 //自动跳转页面
	
}else{
	echo "缺少信息";
}
 $url="add_communication.html";
 echo "<script language='javascript' type=text/javascript>";
 //echo "window.location.href='$url'";
 //等待1.5后自动跳转页面
 echo "setTimeout(function(){window.location.href='$url'},1500);";
 echo "</script>";

?>
