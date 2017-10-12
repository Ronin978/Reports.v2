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
                    <textarea name="date0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="title0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="adress0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="pib0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="no_card0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="brig0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="other0" rows="1"></textarea>
                </td>
                
            </tr>                           
                                
        </table>

        <button type="button" onclick="AddLine5()" >Додати стрічку</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <br>
        <input type="submit" value="Зберегти та продовжити">
    </form>        
</section>

<section>            
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
        <div onclick="document.getElementById('toDate').value = document.getElementById('firstdate').value; document.getElementById('twoform').submit();" class="gotonext">Слідуюча таблиця</div>
    </form>

    <div class="gotoback" onclick="window.history.go(-1); return false;">
        <p>Назад</p>                        
    </div>
</section>

</div>
</div> 
</div>
</div>
</div>              
    

@endsection