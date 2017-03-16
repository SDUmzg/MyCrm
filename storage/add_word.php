<?php 
	header('Content-Type:text/html;charset=utf-8');
	session_start();
	$mychoice=$_SESSION["choice"];	
	$customer_number=$_SESSION["customer_number"];
	$id=$_SESSION["id"];
	$content=$_POST["content"];
	//var_dump($_FILES["fileField"]);
	$filepath="../myfile/".$_FILES['fileField']['name'];
	//var_dump(is_uploaded_file($_FILES['fileField']['tmp_name']));
	 if(is_uploaded_file($_FILES['fileField']['tmp_name']))
	{
  		//若是则则把缓存中的移到指定的文件下
    	if(move_uploaded_file($_FILES['fileField']['tmp_name'],$filepath))
			echo "保存成功";
		else
			echo "保存失败";
  	}
  	$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
  	$query1="insert $mychoice values(null,'$filepath','$content');";
  	$affected1=$dbh->exec($query1);
  	//echo "$query","<br/>";
  	//echo "1影响次数","$affected1","<br/>";
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
	//echo "2影响次数","$affected2","<br/>";

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