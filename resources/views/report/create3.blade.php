@extends('layouts.shablon1')

@section('content')

@include('flash::message')

<div id="templatemo_wrapper">
     
    <form id="firstForm" method="POST" action="{{action('ReportController@store3')}}">

        <div id="templatmeo_menu">
            <p align="center">Транспортування на Луцьк (Київ) {{$date}}</p>
            <input id="date" type="hidden" name="date" value="{{$date}}">
        </div>
        <div id="templatemo_main">
    	   <div id="home" class="main_box">
        	   <div class="col col-my">
                    <div align="center">
         <table id="twoTable" border="1">
                            <tr>
                                <td class="firstColumn">№<br>п/п</td>
                                <td>Дата/час</td>
                                <td>№ карти виїзду</td>
                                <td>ПІП хворого</td>
                                <td>Звідки забрано</td>
                                <td><div class="rotate">Куди доставлено</div></td>
                                <td><div class="rotate">направлення</div></td>
                                <td>Хто направляє</td>
                                <td>Діагноз</td>
                                <td>№ бр., керівник</td>
                                <td>Примітки</td>
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
                                    <input type="text" name="pib0">
                                </td>
                                <td>
                                    <input type="text" name="at0">
                                </td>
                                <td>
                                    <input type="text" name="from0">
                                </td>
                                <td>
                                    <input type="text" name="direct0">
                                </td>
                                <td>
                                    <input type="text" name="who_direct0">
                                </td>
                                <td>
                                    <input type="text" name="diagnoz0">
                                </td>
                                <td>
                                    <input type="text" name="brig0">
                                </td>
                                <td>
                                    <input type="text" name="other0">
                                </td>

                            </tr>                           
                                                
                        </table>

                        <button type="button" onclick="AddLine3()" >Додати стрічку</button>
                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <br>
                    </div>

                    <input type="submit" value="Save">
        </form>        
                </div> 
                    <div class="cleaner"></div>
                    <form id="twoform" method="GET" action="{{action('ReportController@create4')}}">
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