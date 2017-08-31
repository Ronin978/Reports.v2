function oninput2()
{
    var mass0 = [];
    var mass1 = [];
    var first = 0;
    var two = 0;
    for (var i = 34; i <= 51; i++) {
        var example = document.getElementById('value'+i).value.split('+');
        
        if (example[0]!=='') {
            first = example[0];
        }
        
        if (example[1]!=='') {
            two = example[1];
        }

        mass0[mass0.length] = first;
        mass1[mass1.length] = two;
    }
    
    var sum0 = 0;
    var sum1 = 0;

    for(var i = 0; i < mass0.length; i++){
        sum0 += parseInt(mass0[i]);
        sum1 += parseInt(mass1[i]);
    }

    document.getElementById('pmcd0').innerHTML = sum0;
    document.getElementById('pmcd1').innerHTML = sum1;
}

function AddLine2()
{
    var table = document.getElementById("twoTable"); 
    var row = table.insertRow(table.rows.length); // Добавляем строку

     // Формируем строку элементов управления
    var index = (table.rows.length-2);
    var cell1 = row.insertCell(0);
    var text1 = document.createElement("p"); // Ввод text1
    text1.innerHTML= index+1;
    cell1.appendChild(text1);

    var arr = ["punkt", "no_card", "adress", "brig", 
    "time", "support", "cause", "call"]

    for (var i = 0; i <= arr.length - 1;  i++) {
        var cell = row.insertCell(i+1);
        var text = document.createElement("input"); // Ввод text2
        text.setAttribute("type", "text");
        text.setAttribute("name", arr[i]+index);
        cell.appendChild(text);
    }
}

function AddLine3()
{
    var table = document.getElementById("twoTable"); 
    var row = table.insertRow(table.rows.length); // Добавляем строку

     // Формируем строку элементов управления
    var index = (table.rows.length-2);
    var cell1 = row.insertCell(0);
    var text1 = document.createElement("p"); // Ввод text1
    text1.innerHTML= index+1;
    cell1.appendChild(text1);

    var arr = ["date", "no_card", "pib", "at", 
    "from", "direct", "who_direct", "diagnoz", "brig", "other"]

    for (var i = 0; i <= arr.length - 1;  i++) {
        var cell = row.insertCell(i+1);
        var text = document.createElement("input"); // Ввод text2
        text.setAttribute("type", "text");
        text.setAttribute("name", arr[i]+index);
        cell.appendChild(text);
    }
}

function AddLine4()
{
    var table = document.getElementById("table4"); 
    var row = table.insertRow(table.rows.length); // Добавляем строку

     // Формируем строку элементов управления
    var index = (table.rows.length-2);
    var cell1 = row.insertCell(0);
    var text1 = document.createElement("p"); // Ввод text1
    text1.innerHTML= index+1;
    cell1.appendChild(text1);

    var arr = ["date", "no_card", "adress", "pib", "age", 
    "diagnoz", "brig", "tromb", "stent", "gospital", "support"]

    for (var i = 0; i <= arr.length - 1;  i++) {
        var cell = row.insertCell(i+1);
        var text = document.createElement("input"); // Ввод text2
        text.setAttribute("type", "text");
        text.setAttribute("name", arr[i]+index);
        cell.appendChild(text);
    }
}

function AddLine5()
{
    var table = document.getElementById("twoTable"); 
    var row = table.insertRow(table.rows.length); // Добавляем строку

     // Формируем строку элементов управления
    var index = (table.rows.length-2);
    var cell1 = row.insertCell(0);
    var text1 = document.createElement("p"); // Ввод text1
    text1.innerHTML= index+1;
    cell1.appendChild(text1);

    var arr = ["date", "title", "adress", "pib", "no_card",
    "brig", "other"]

    for (var i = 0; i <= arr.length - 1;  i++) {
        var cell = row.insertCell(i+1);
        var text = document.createElement("input"); // Ввод text2
        text.setAttribute("type", "text");
        text.setAttribute("name", arr[i]+index);
        cell.appendChild(text);
    }
}

function AddLine6()
{
    var table = document.getElementById("twoTable"); 
    var row = table.insertRow(table.rows.length); // Добавляем строку

     // Формируем строку элементов управления
    var index = (table.rows.length-2);
    var cell1 = row.insertCell(0);
    var text1 = document.createElement("p"); // Ввод text1
    text1.innerHTML= index+1;
    cell1.appendChild(text1);

    var arr = ["date", "no_card", "subdiv", "other"]

    for (var i = 0; i <= arr.length - 1;  i++) {
        var cell = row.insertCell(i+1);
        var text = document.createElement("input"); // Ввод text2
        text.setAttribute("type", "text");
        text.setAttribute("name", arr[i]+index);
        cell.appendChild(text);
    }
}