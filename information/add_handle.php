 <?php 
header('Content-Type:text/html;charset=utf-8');
/*var_dump($_POST);
var_dump( $_SERVER['REQUEST_TIME']);*/
echo "正在添加.....","<br/>";
 $customer_number=$_POST["counterman_number"].$_SERVER['REQUEST_TIME'];
 $id=$_POST["id"];
 $username=$_POST["username"];
 $sex=$_POST["sex"];
 $birthday=$_POST["birthday"];
 $industry=$_POST["industry"];
 $area=$_POST["area"];
 $grade_level=$_POST["grade_level"];
 $phone_number=$_POST["phone_number"];
 $mail_address=$_POST["mail_address"];
 $dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
 //echo $customer_number,$id,$username,$sex,$birthday,$industry,$area,$grade_level,$phone_number,$mail_address;
 //$query="insert into customer values(,,,,,,,,,);";
 $query="insert into customer values('$customer_number','$id','$username','$sex','$birthday','$industry','$area','$grade_level','$phone_number','$mail_address');";

 $affected=$dbh->exec($query);
// echo "影响次数","$affected";
// echo "添加完成";
 $mystuation=($affected==1)?"添加成功  o(≧v≦)o~~好棒":"添加失败   (￣▽￣＃) = ﹏﹏";
 echo "$mystuation";
 //自动跳转页面
 $url="add_information.html";
 echo "<script language='javascript' type=text/javascript>";
 //echo "window.location.href='$url'";
 //等待1.5后自动跳转页面
 echo "setTimeout(function(){window.location.href='$url'},1500);";
 echo "</script>";

?>