<?php 
header('Content-Type:text/html;charset=utf-8');
session_start();
$mychoice=$_SESSION["choice"];
$customer_number=$_SESSION["customer_number"];
$id=$_SESSION["id"];
//日期格式  2012-08-16 12:30:30  其中 -16 12：  之间的空格 不要用  ‘&nbsp’ 直接用 ''就行
$mytime=$_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"].' '.$_POST["hour"].':'.$_POST["min"].':'.'00';
$content=$_POST["content"];
//echo $mychoice,$customer_number,$mytime,$content;
$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
$query1="insert $mychoice values(null,'$mytime','$content');";
$affected1=$dbh->exec($query1);
//echo "影响次数","$affected1","<br/>";
if ($affected1==1) {
	$lastid="select last_insert_id();";
	$customer_insert="customer_".$mychoice;
	$result=$dbh->query($lastid);
	foreach ($result AS $row)
		{
			$plan_number=$row[0];
		}
	$query2="insert $customer_insert values('$id','$plan_number');";
	$affected2=$dbh->exec($query2);
	//echo "影响次数","$affected1","<br/>";

}
 $mystuation=($affected1==1&&$affected2==1)?"添加成功  o(≧v≦)o~~好棒":"添加失败   (￣▽￣＃) = ﹏﹏";
 echo "$mystuation";
 //自动跳转页面
 $url="add_storage.php";
 echo "<script language='javascript' type=text/javascript>";
 //echo "window.location.href='$url'";
 //等待1.5后自动跳转页面
 echo "setTimeout(function(){window.location.href='$url'},1500);";
 echo "</script>";

?>
