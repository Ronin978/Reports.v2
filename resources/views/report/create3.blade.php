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

        <p align="center">Транспортування на Луцьк (Київ) {{$date}}</p>
        <input id="date" type="hidden" name="date" value="{{$date}}">
    
        <table id="table3">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата/час</td>
                <td>№ карти виїзду</td>
                <td>ПІП хворого</td>
                <td>Звідки забрано</td>
                <td id="maxLenght" class="rotate">Куди доставлено</td>
                <td class="rotate">направлення</td>
                <td>Хто направляє</td>
                <td>Діагноз</td>
                <td>№ бр., керівник</td>
                <td>Примітки</td>
            </tr> 
            <tr>
                <td>
                    <div>1</div>
                </td>
                <td>
                    <textarea name="date0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="no_card0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="pib0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="at0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="from0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="direct0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="who_direct0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="diagnoz0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="brig0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="other0" rows="1"></textarea>
                </td>

            </tr>                           
                                
        </table>

        <button type="button" onclick="AddLine3()" >Додати стрічку</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <br>
        <input type="submit" value="Зберегти та продовжити">
    </form>        
</section>

<section>           
     <a href="{{action('ReportController@create4', ['date'=>$date])}}">Слідуюча таблиця</a>

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