@extends('layouts.shablon1')

@section('content')

@include('flash::message')

<div id="templatemo_wrapper">
     
    <form id="firstForm" method="POST" action="{{action('ReportController@store4')}}">

        <div id="templatmeo_menu">
            <p align="center">ГКС {{$date}}</p>
            <input id="date" type="hidden" name="date" value="{{$date}}">
        </div>
        <div id="templatemo_main">
           <div id="home" class="main_box">
               <div class="col col-my">
                    <div align="center">
                        <table id="table4" border="1">
                            <tr class="firstTr">
                                <td class="firstColumn">№<br>п/п</td>
                                <td>Дата,час</td>
                                <td>№ карти виїзду</td>
                                <td>Адреса виклику</td>
                                <td>ПІП хворого</td>
                                <td>Вік</td>
                                <td>Діагноз</td>
                                <td>№ бр.,<br> керівник</td>
                                <td><div class="rotate">Тромболізис</div></td>
                                <td><div class="rotate">Стентування</div></td>
                                <td><div class="rotate">Госпіталізація(лікувальний заклад)/година</div></td>
                                <td><div class="rotate">Зв’язок з лікарем консультантом</div>
                                </td>
                                
                            </tr> 
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <input type="text" name="date0">
                                </td>
                                <td>
                                    <input type="text" name="no_card0">
                                </td>
                                <td>
                                    <input type="text" name="adress0">
                                </td>
                                <td>
                                    <input type="text" name="pib0">
                                </td>
                                <td>
                                    <input type="text" name="age0">
                                </td>
                                <td>
                                    <input type="text" name="diagnoz0">
                                </td>
                                <td>
                                    <input type="text" name="brig0">
                                </td>
                                <td>
                                    <input type="text" name="tromb0">
                                </td>
                                <td>
                                    <input type="text" name="stent0">
                                </td>
                                <td>
                                    <input type="text" name="gospital0">
                                </td>
                                <td>
                                    <input type="text" name="support0">
                                </td>

                            </tr>                           
                                                
                        </table>

                        <button type="button" onclick="AddLine4()" >Додати стрічку</button>
                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <br>
                    </div>

                    <input type="submit" value="Save">
        </form>        
                </div> 
                    <div class="cleaner"></div>
                    <form id="twoform" method="GET" action="{{action('ReportController@create5')}}">
                        <input id="toDate" type="hidden" name="date" value="">
                        <div class="gotoback" onclick="window.history.go(-1); return false;">
                            <p>Back</p>                        
                        </div>

                        <div onclick="document.getElementById('toDate').value = document.getElementById('date').value; document.getElementById('twoform').submit();" class="gotonext"><p>Next</p></div>
                    </form>
                <div class="cleaner"></div>
        </div> 

        <div id="templatemo_footer">
            Copyright © 2048 Your Company Name<br /> Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
        </div> 
    


</div>

@endsection