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
   
        <p align="center">ГКС {{$date}}</p>
        <input id="date" type="hidden" name="date" value="{{$date}}">
       
        <table id="table4">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ карти виїзду</td>
                <td>Адреса виклику</td>
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
                    <textarea name="date0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="no_card0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="adress0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="pib0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="age0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="diagnoz0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="brig0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="tromb0" rows="1"></textarea>
                </td>
                <td>
                   <textarea name="stent0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="gospital0" rows="1"></textarea>
                </td>
                <td>
                    <textarea name="support0" rows="1"></textarea>
                </td>

            </tr>                           
                                
        </table>

        <button type="button" onclick="AddLine4()" >Додати стрічку</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <br>
        <input type="submit" value="Save">
    
    </form>
</section>

<section>  
    <a href="{{action('ReportController@create5', ['date'=>$date])}}">Next</a>

     <div class="gotoback" onclick="window.history.go(-1); return false;">
        <p>Back</p>                        
    </div>
</section>

</div>
</div> 
</div>
</div>
</div>

@endsection