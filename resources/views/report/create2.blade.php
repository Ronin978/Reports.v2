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
    
    
        <p align="center">Інформація по запізненнях бригад на виклики за {{$date}}</p>
        <input id="date" type="hidden" name="date" value="{{$date}}">
            <table id="table2">
                <tr id="firstTr">
                    <td>№<br>п/п</td>
                    <td>Відділення / пункт що має обслуговувати</td>
                    <td>№ виїзної карти /е(н)</td>
                    <td>Адреса виклику (район)</td>
                    <td>№ Бригада що обслуговувала</td>
                    <td>Час поступлення /Час виїзду/Час прибуття/ Тривалість запізнення (хв.)</td>
                    <td id="maxLenght" class="rotate">постдиспетч підтримка</td>
                    <td>Причина запізнення Відсутність вільної бр./ Відстань більше 30км/ Незадовільний стан доріг</td>
                    <td>Привід до виклику /Діагноз /Госпіталізація (відмова)</td>
                </tr> 
                <tr>
                    <td>
                        <DIV>1</DIV>
                    </td>
                    <td>
                        <textarea name="punkt0" rows="1"></textarea>
                    </td>
                    <td>
                        <textarea name="no_card0" rows="1"></textarea>
                    </td>
                    <td>
                        <textarea name="adress0" rows="1"></textarea>
                    </td>
                    <td>
                        <textarea name="brig0" rows="1"></textarea>
                    </td>
                    <td>
                        <textarea name="time0" rows="1"></textarea>
                    </td>
                    <td>
                        <textarea name="support0" rows="1"></textarea>
                    </td>
                    <td>
                        <textarea name="cause0" rows="1"></textarea>
                    </td>
                    <td>
                        <textarea name="call0" rows="1"></textarea>
                    </td>
                </tr>                           
                                    
            </table>

            <button type="button" onclick="AddLine2()" >Додати стрічку</button>
        
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <br>
            <input type="submit" value="Save">
        
    </form> 
</section>           
    
<section>
    <a href="{{action('ReportController@create3', ['date'=>$date])}}">Next</a>

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