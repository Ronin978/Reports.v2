@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>  
    <form id="firstForm" method="POST" action="{{action('ReportController@store4')}}">   
        <p align="center">ГКС за <input id="firstdate" type="date" name="date" value="{{$date}}"></p>       
        <table id="table4">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ карти виїзду</td>
                <td>Адреса виклику</td>
                <td>Відділення</td>
                <td>ПІП хворого</td>
                <td>Вік</td>
                <td>Діагноз</td>
                <td>№ бр.,<br> керівник</td>
                <td class="rotate">Тромболізис</td>
                <td class="rotate">Стентування</td>
                <td id="maxLenght" class="rotate">Госпіталізація<br>(лікувальний заклад)/година</td>
                <td class="rotate">Зв’язок з лікарем консультантом
                </td>
            </tr> 
            <tr>
                <td>
                    <div>1</div>
                </td>
                <td>
                    <textarea name="date0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="no_card0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="adress0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <input list="myList" name="viddil0">
                        <datalist id="myList">
                            <?php include 'viddil.php' ?>
                        </datalist>
                </td>
                <td>
                    <textarea name="pib0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="age0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="diagnoz0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="brig0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="tromb0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                   <textarea name="stent0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="gospital0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="support0" rows="1" data="elastic"></textarea>
                </td>
            </tr>              
        </table>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        
        <div class="btn-group small-btn-group" onclick="AddLine4()" align="center">
            <span>
                <img src="{{asset('css/ico/add.png')}}">
                Додати рядок   
            </span>
        </div><br>
        <div class="panel" align="center">   
            <div class="btn-group" onclick="document.getElementById('firstForm').submit();">
                <span>
                    <img src="{{asset('css/ico/save.png')}}">Зберегти
                </span>
            </div>
        </div>
    </form>
</section>

<section align = "center">  
    <div class="btn-group" onclick="window.history.go(-1); return false;">
        <span>
            Назад
            <img src="{{asset('css/ico/back.png')}}">   
        </span>                  
    </div> 
    <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'fatal'])}}">
        <input id="toDate" type="hidden" name="date" value="">
        <div class="btn-group" onclick="document.getElementById('toDate').value = document.getElementById('firstdate').value; document.getElementById('twoform').submit();" class="gotonext">            
            <span>
                <img src="{{asset('css/ico/next.png')}}">
                Далі
            </span>
        </div>
    </form>
</section>
</div>
</div> 
</div>
</div>
</div>

@endsection