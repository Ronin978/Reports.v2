@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>
    <form id="firstForm" method="POST" action="{{action('ReportController@store6')}}">

        <p align="center">Зауваження по роботі, скарги, подяки за <input id="firstdate" type="date" name="date" value="{{$date}}"></p>
    
        <table id="table6">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ картки</td>
                <td>Відділення</td>
                <td>Примітки</td>
            </tr> 
            <tr>
                <td>
                    1
                </td>
                <td>
                    <textarea name="date0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="no_card0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="subdiv0" rows="1" data="elastic"></textarea>
                </td>
                <td>
                    <textarea name="other0" rows="1" data="elastic"></textarea>
                </td>
            </tr>               
        </table>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        
        <div class="btn-group small-btn-group" onclick="AddLine6()" align="center">
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
    <form id="twoform" method="GET" action="{{action('FrontController@index')}}">
        <div class="btn-group" onclick="document.getElementById('twoform').submit();">
            <span>
                <img src="{{asset('css/ico/down.png')}}">Завершити
            </span>
        </div>
</section>
</div>
</div> 
</div>
</div>
</div>

@endsection