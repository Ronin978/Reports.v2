@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>     
    <form id="firstForm" method="POST" action="{{action('ReportController@store3')}}">
        <p align="center">Транспортування на Луцьк (Київ) <input id="firstdate" type="date" name="date" value="{{$date}}"></p>    
        <table id="table3">
            <tr style="height: 130px;">
                <td class="col_3">№<br>п/п</td>
                <td class="col_8">Дата/час</td>
                <td>Відділення</td>
                <td class="col_8">№ карти виїзду</td>
                <td class="col_12">ПІП хворого</td>
                <td class="col_15">Звідки забрано</td>
                <td class="col_5 maxLenght">Куди доставлено</td>
                <td class="col_3 rotate_two">направлення</td>
                <td class="col_10">Хто направляє</td>
                <td >Діагноз</td>
                <td class="col_10">№ бр., керівник</td>
                <td class="col_8">Примітки</td>
            </tr> 
            <tr>
                <td>
                    <div>1</div>
                </td>
                <td>
                    <textarea name="date0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <input size="12" list="myList" name="viddil0">
                        <datalist id="myList">
                            <?php include 'viddil.php' ?>
                        </datalist>
                </td>
                <td>
                    <textarea name="no_card0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="pib0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="at0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="from0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="direct0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="who_direct0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="diagnoz0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="brig0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="other0" rows="1" data="elastic"></textarea>
                </td>
            </tr>              
        </table>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="btn-group small-btn-group" onclick="AddLine3()" align="center">
            <span>
                <img src="{{asset('css/ico/add.png')}}">
                Додати рядок   
            </span>
        </div> 
        <br>
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
    <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'Report4'])}}">
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