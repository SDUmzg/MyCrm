<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加计划</title>
</head>
<body>
	<div id="container">
		<table>
			<tr>
				<td>客户编号：</td>
				<td>
					<?php 
						$customer_number=$_GET["customer_number"];
						echo $customer_number;
					?>
					&nbsp
				</td>
				<td>&nbsp客户姓名：</td>
				<td>					
					<?php 
						echo $_GET["name"];
					?>
					&nbsp
				</td>
				<td>&nbsp身份证号：</td>
				<td>
					<?php 
						$id=$_GET["id"];
						echo $id;
					?>
				</td>
			</tr>
		</table>
		<hr>
	</div>
	<div id="main">
		<?php 
			if ($_GET["choice"]!=4) 
			{
				if($_GET["choice"]==1)
				{
					$choice="work_plan";
					echo "添加工作计划";
				}elseif ($_GET["choice"]==2)
				{
					$choice="notepad";
					echo "添加记事";
				}else
				{
					$choice="diary";
					echo "添加日记";
				}
				echo '
		<form action="add_data.php" method="post">
			<table>
				<tr>
					<td>
						<select name="year" id="myyear">
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						</select>年
						<select name="month" id="month">
						<option value="01">1</option>
						<option value="02">2</option>
						<option value="03">3</option>
						<option value="04">4</option>
						<option value="05">5</option>
						<option value="06">6</option>
						<option value="07">7</option>
						<option value="08">8</option>
						<option value="09">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						</select>月
					</td>
					<td>
						<input type="text" name="day" size="2">日
						<input type="text" name="hour" size="2">时
						<input type="text" name="min" size="2">分
					</td>
				</tr>
				<tr>
					<td>正文：</td>
					<td>
						<textarea name="content" id="" cols="90" rows="40">请输入正文</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" style=" text-align:center;" ><input   type="submit" value="提交"></td>
				</tr>
			</table>
		</form>
		<a href="add_storage.php">返回</a>';
			}else{
				$choice="document";
				echo "添加文档";
				echo '
				<form action="add_word.php" method="post" enctype="multipart/form-data">
       				<input type="file" name="fileField"  size="28"  />
       				<br/> 
       					备注信息:<textarea name="content" cols="60" rows="5"></textarea>
       				<br/>
       				<input type="submit" value="保存" />
    			</form> ';
			}
			session_start();
			$_SESSION["choice"]=$choice;
			$_SESSION["customer_number"]=$customer_number;
			$_SESSION["id"]=$id;
		?>


	</div>
</body>
</html>