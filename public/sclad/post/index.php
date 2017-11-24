<!DOCTYPE html>
<html>
<head>
	<title>Склад</title>
	<link rel="stylesheet" type="text/css" href="../admin.css">
</head>
<body>
<form id="myForm" action="show1.php" method="POST">
<div id="mainE">
	<div class="table-inline">
		<p>КЗ "ВОЦЕМДМК"</p>
		<div class="title">
			<p>НАКЛАДНА  №<input type="text" name="no" value="<?php if(!empty($_POST['no'])) echo $_POST['no'];?>"></p>
		 	від <input type="date" name="date" value="<?php if(empty($_POST['no'])){ echo date('Y-m-d');}else{ echo $_POST['date']; } ?>"> р.<br>
		 </div>
		 Кому відпущено:<input type="text" name="fromName" value="<?php if(!empty($_POST['fromName'])) echo $_POST['fromName'];?>"><br>
		 Склад <input type="text" name="zav" value="<?php if(empty($_POST['zav'])){ echo 'Шум';}else{ echo $_POST['zav']; } ?>"> <br>
		 За довіреністю серія___№___________від «__»_____20__ р.<br>
		 Основа<br>
		<table id="tableEdit">
			<tr>
				<td class="col1">№ п/п</td>
				<td class="col2">Найменування</td>
				<td class="col3">Од. вим.</td>
				<td class="col4">Ціна</td>
				<td class="col5">Кількість</td>
			</tr>
		<?php 
				if(empty($_POST["name0"])&&empty($_POST["metric0"])&&empty($_POST["price0"])&&empty($_POST["amount0"])&&empty($_POST["cod0"]))
				{
					echo
					'<tr>
						<td class="col1">1</td>
						<td class="col2"><textarea name="name0" rows="1"></textarea></td>
						<td class="col3"><textarea name="metric0" rows="1"></textarea></td>
						<td class="col4"><textarea name="price0" rows="1"></textarea></td>
						<td class="col5"><textarea name="amount0" rows="1"></textarea></td>
					</tr>
					<tr>
						<td colspan="5"><textarea name="cod0" rows="2"></textarea></td>
					<tr>
					';
				}
				else
				{
					for($i = 0; $i < ((count($_POST)-6)/5); $i++)
					{
						echo '<tr>
								<td class="col1">'.($i+1).'</td>
								<td class="col2">
									<textarea name="name'.$i.'" rows="1">'.$_POST["name$i"].'</textarea>
								</td>
								<td class="col3">
									<textarea name="metric'.$i.'" rows="1">'.$_POST["metric$i"].'</textarea>
								</td>
								<td class="col4">
									<textarea name="price'.$i.'" rows="1">'.$_POST["price$i"].'</textarea>
								</td>
								<td class="col5">
									<textarea name="amount'.$i.'" rows="1">'.$_POST["amount$i"].'</textarea>
								</td>
							</tr>
							<tr>
								<td colspan="5"><textarea name="cod'.$i.'" rows="1">'.$_POST["cod$i"].'</textarea></td>
							<tr>
							';
					}
				
				}
		?>			
		</table>		
	</div>
	<div id="btnGroup" align="center">		
		<div class="pointer" onclick="AddRow2();">Додати</div><br>
	</div>
		<br>Видав:&nbsp<input type="text" name="from" value="<?php if(!empty($_POST['from'])) echo $_POST['from'];?>"><br>
		Отримав:&nbsp<input type="text" name="at" value="<?php if(!empty($_POST['at'])) echo $_POST['at'];?>"><hr>
		<button onclick="document.getElementById('myForm').submit();">Продовжити</button><hr>
		<button onclick="window.open('/sclad');">Нова накладна 1</button>
		<button onclick="window.open('/sclad/post');">Нова накладна 2</button>
	
</div>
</form>
</body>
<script src="../myFunction.js"></script>
</html>