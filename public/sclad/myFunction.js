function AddRow()
	{
		var table = document.getElementById("tableEdit"); 
	    var row = table.insertRow(table.rows.length); // Добавляем строку

	     // Формируем строку элементов управления
	    var index = (table.rows.length-2);
	    var cell1 = row.insertCell(0);
	    var text1 = document.createElement("div"); // Ввод text1
	    text1.innerHTML= index+1;
	    cell1.appendChild(text1);

	    var arr = ["name", "metric", "price", 
	    "amount"];

	    for (var i = 0; i <= arr.length - 1;  i++) 
	    {
	        var cell = row.insertCell(i+1);
	        var text = document.createElement("textarea"); // Ввод text2
	        text.setAttribute("rows", "1");
	        text.setAttribute("name", arr[i]+index);
	        cell.appendChild(text);
	    }
	}

function AddRow2()
	{
		var table = document.getElementById("tableEdit"); 
	    var row = table.insertRow(table.rows.length); // Добавляем строку
	    var row2 = table.insertRow(table.rows.length); // Добавляем строку

	     // Формируем строку элементов управления
	    var index = (table.rows.length/2-2);
	    var cell1 = row.insertCell(0);
	    var text1 = document.createElement("div"); // Ввод text1
	    text1.innerHTML= index+1;
	    cell1.appendChild(text1);

	    var arr = ["name", "metric", "price", 
	    "amount"];

	    for (var i = 0; i <= arr.length - 1;  i++) 
	    {
	        var cell = row.insertCell(i+1);
	        var text = document.createElement("textarea"); // Ввод text2
	        text.setAttribute("rows", "1");
	        text.setAttribute("name", arr[i]+index);
	        cell.appendChild(text);
	    }

	    var cell2 = row2.insertCell(0);
	    cell2.setAttribute("colspan", "5");
	    var text2 = document.createElement("textarea"); // Ввод textarea
	    text2.setAttribute("rows", "1");
	    text2.setAttribute("name", "cod"+index );
	    cell2.appendChild(text2);
	}