<!DOCTYPE html>
<html>
<head>
	<title>Склад</title>
	<link rel="stylesheet" type="text/css" href="../admin.css">	
</head>
<body>
<div id="main">
<form action="/sclad/post/index.php" method="POST">
	<div id="pagePrint">
	<?php
		for($j = 1; $j <=3; $j++)
		{			
			$datell = explode('-', $_POST['date']);
	        $dateD = "$datell[2]-$datell[1]-$datell[0]";
			echo '<div class="table-inline">
			КЗ "ВОЦЕМДМК"
			<div class="title">
				<p>НАКЛАДНА  №'.$_POST['no'].'</p>
				 від '.$dateD.'р.<br>
			</div>
			Кому відпущено: '.$_POST['fromName'].'<br>
			Склад '.$_POST['zav'].'<br>
			За довіреністю серія___№___________від «__»_____20__ р.<br>
			Основа<br>
			<table id="tableShow">
				<tr>
					<td class="col1">№ п/п</td>
					<td class="col2">Найменування</td>
					<td class="col3">Од. вим.</td>
					<td class="col4">Ціна</td>
					<td class="col5">Кількість</td>
				</tr>';
		 	for($i = 0; $i < ((count($_POST)-6)/5); $i++)
			{ 
				echo '
					<input type="hidden" name="name'.$i.'" value="'.$_POST["name$i"].'">
					<input type="hidden" name="metric'.$i.'" value="'.$_POST["metric$i"].'">
					<input type="hidden" name="price'.$i.'" value="'.$_POST["price$i"].'">
					<input type="hidden" name="amount'.$i.'" value="'.$_POST["amount$i"].'">
					<input type="hidden" name="cod'.$i.'" value="'.$_POST["cod$i"].'">					
					<tr>
						<td class="col1">'.($i+1).'</td>
						<td class="col2"  align="left">'.$_POST["name$i"].'</td>
						<td class="col3">'.$_POST["metric$i"].'</td>
						<td class="col4">'.$_POST["price$i"].'</td>
						<td class="col5">'.$_POST["amount$i"].'</td>
					</tr>
					<tr><td colspan="5">'.$_POST["cod$i"].'</td></tr>
					';
	 		} 
			echo '</table><div><br>Видав:&nbsp_____'.$_POST['from'].'<br><br>Отримав:&nbsp_____'.$_POST['at'].'</div></div>';
		}
	?>
	</div>
	<input type="hidden" name="date" value="<?php echo $_POST['date'];?>">
	<input type="hidden" name="no" value="<?php echo $_POST['no'];?>">
	<input type="hidden" name="fromName" value="<?php echo $_POST['fromName'];?>">
	<input type="hidden" name="zav" value="<?php echo $_POST['zav'];?>">
	<input type="hidden" name="from" value="<?php echo $_POST['from'];?>">
	<input type="hidden" name="at" value="<?php echo $_POST['at'];?>">
	<input type="submit" value="Редагувати">
</form>
	<hr>
	<div id="btnGroup">
		<button onclick="CallPrint('pagePrint')">Роздрукувати</button><hr>
		<button onclick="window.open('/sclad');">Нова накладна 1</button>
		<button onclick="window.open('/sclad/post');">Нова накладна 2</button>
	</div>
	<hr>
</div>
</body>
<script type="text/javascript">
		function CallPrint(strid) 
	    { 
	        var prtContent = document.getElementById(strid); 
	        var WinPrint = window.open('', '', 'left=50,top=50,width=screen.availWidth, height=screen.availHeight,toolbar=0,scrollbars=1,status=0, onload=1'); 
	        WinPrint.document.write('<html><head><title>Print</title><link rel="stylesheet" type="text/css" href="../admin.css"></head><body>'); 
	        WinPrint.document.write(prtContent.innerHTML); 
	        WinPrint.document.write("<script>window.onload=function(){ window.print(); window.close(); }<\/script></body></html>"); 

	        WinPrint.document.close(); 
	        WinPrint.focus(); 
	      //  WinPrint.print(); 
	       // WinPrint.close();	         
	    }
	</script>
</html>