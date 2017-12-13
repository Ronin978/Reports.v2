@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>  
    <form id="firstForm" method="POST" action="{{action('ReportController@store5')}}">
   
        <p align="center"> {{"$title"}} за <input id="firstdate" type="date" name="date" value="{{$date}}"></p>
        <input type="hidden" name="pidtype" value="{{$pidtype}}">
        <table id="table5">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>                
                <td>Відділення</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
            <tr>
                <td>
                    <div>1</div>
                </td>
                <td>
                    <textarea name="date0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="title0" rows="1" data="elastic"></textarea>
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
                    <textarea name="no_card0" rows="1" data="elastic"></textarea>
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
        
        <div class="btn-group small-btn-group" onclick="AddLine5()" align="center">
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
    @if ($pidtype=='fatal')
        <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'dtp+ns'])}}">
    @elseif($pidtype=='dtp+ns')
        <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'high_travmy'])}}">
    @elseif($pidtype=='high_travmy')
        <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'tr_kytyzi'])}}">
    @elseif($pidtype=='tr_kytyzi')
        <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'opic'])}}">
    @elseif($pidtype=='opic')
       <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'travmat'])}}">
    @elseif($pidtype=='travmat')
        <form id="twoform" method="GET" action="{{action('ReportController@create', ['table'=>'Report6'])}}">
    @endif
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