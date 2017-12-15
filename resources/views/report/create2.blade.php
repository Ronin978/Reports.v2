@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>
    <form id="firstForm" method="POST" action="{{action('ReportController@store2')}}">    
    
        <p align="center">Інформація по запізненнях бригад на виклики за <input id="firstdate" type="date" name="date" value="{{$date}}"></p>        
        <table id="table2">
            <tr id="firstTr">
                <td class="col_3">№<br>п/п</td>
                <td class="col_15">Відділення / пункт що має обслуговувати</td>
                <td class="col_8">№ виїзної карти /е(н)</td>
                <td class="col_15">Адреса виклику (район)</td>
                <td class="col_10">№ Бригада що обслуговувала</td>
                <td class="col_15">Час поступлення /Час виїзду/Час прибуття/ Тривалість запізнення (хв.)</td>
                <td class="col_5 rotate45">постдиспетч<br> підтримка</td>
                <td class="col_10">Причина запізнення Відсутність вільної бр./ Відстань більше 30км/ Незадовільний стан доріг</td>
                <td>Привід до виклику /Діагноз /Госпіталізація (відмова)</td>
            </tr> 
            <tr>
                <td>
                    <DIV>1</DIV>
                </td>
                <td>
                    <input size="14" list="myList" name="punkt0">
                        <datalist id="myList">
                            <?php include 'viddil.php' ?>
                        </datalist>
                </td>
                <td>
                    <textarea name="no_card0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="adress0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="brig0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="time0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="support0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="cause0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="call0" rows="1"  data="elastic"></textarea>
                </td>
            </tr>              
        </table>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>        
        <div class="btn-group small-btn-group" onclick="AddLine2()" align="center">
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
    <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'Report3'])}}">
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