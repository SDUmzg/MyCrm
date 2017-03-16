<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>客户关系管理信息系统</title>
	<link rel="stylesheet" href="./mycss/reset.css">
	<link rel="stylesheet" href="./mycss/header.css">
	<link rel="stylesheet" href="./mycss/main.css">
	<link rel="stylesheet" href="./mycss/footer.css">
</head>
<body>
	<div id="continer">
		<div id="header">
			客户关系管理信息系统
		</div>
		<div id="main">
			<div id="mylanding">
				<table>
					<tr>
						<td>用户登陆界面:</td>
						<td>
							<?php 
							$id=$_POST["id"];
							$password=$_POST["password"];
							$dbh=new PDO('mysql:host=localhost;dbname=mycrm;port=3306','myroot','1666188');
							$query="select * from clerk where  id='$id' ;";
							$result=$dbh->query($query);
							foreach ($result AS $row) {
								if ($row[2]==$password) {
									echo "HAPPY";
								}else
								{
									echo "账户或密码有误";
									$url="index1.html";
 									echo "<script language='javascript' type=text/javascript>";
 									echo "setTimeout(function(){window.location.href='$url'},1500);";
 									echo "</script>";
								}
							}
							?>
							
						</td>
					</tr>
					<tr>
						<td>业务员：</td>
						<td><?php  echo $_POST["id"];?></td>
					</tr>
					<tr>
						<td>职位：</td>
						<td><?php  echo $_POST["job"];?></td>
					</tr>
				</table>
			</div>
			<div id="mymould">
				<div class="subtitle">
					<img src="./image/circle.gif" alt="" />
					<h1>常用模块</h1>
				</div>
				<ul id="art">
					<li><a href="information/information.html" target="myframe">基本信息</a></li>
					<li><a href="classify/classify.html" target="myframe">智能化分类</a></li>
					<li><a href="remind/remind.html" target="myframe">提醒业务</a></li>
					<li><a href="storage/storage.html" target="myframe">相关储存</a></li>
					<li><a href="communication/communication.html" target="myframe">通讯业务</a></li>
				</ul>
			</div>
			<div id="myframe">
				<iframe  src="./welcome.html" name="myframe" width="100%" height="100%" frameborder="1" scrolling="yes">
					
				</iframe>
			</div>
		</div>
		<div id="footer">
			这个汇率计算，度量衡
		</div>
	</div>
</body>
</html>