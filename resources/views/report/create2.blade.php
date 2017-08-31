@extends('layouts.shablon1')

@section('content')

@include('flash::message')

<div id="templatemo_wrapper">
     
    <form id="firstForm" method="POST" action="{{action('ReportController@store2')}}">

        <div id="templatmeo_menu">
            <p align="center">Інформація по запізненнях бригад на виклики за {{$date}}</p>
            <input id="date" type="hidden" name="date" value="{{$date}}">
        </div>
        <div id="templatemo_main">
    	   <div id="home" class="main_box">
        	   <div class="col col-my">
                    <div align="center">
                        
                        <table id="twoTable" border="1">
                            <tr>
                                <td class="firstColumn">№<br>п/п</td>
                                <td>Відділення / пункт що має обслуговувати</td>
                                <td>№ виїзної карти /е(н)</td>
                                <td>Адреса виклику (район)</td>
                                <td>№ Бригада що обслуговувала</td>
                                <td>Час поступлення /Час виїзду/Час прибуття/ Тривалість запізнення (хв.)</td>
                                <td><div class="rotate">постдиспетч підтримка</div></td>
                                <td>Причина запізнення Відсутність вільної бр./ Відстань більше 30км/ Незадовільний стан доріг</td>
                                <td>Привід до виклику /Діагноз /Госпіталізація (відмова)</td>
                            </tr> 
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <input type="text" name="punkt0">
                                </td>
                                <td>
                                    <input type="text" name="no_card0">
                                </td>
                                <td>
                                    <input type="text" name="adress0">
                                </td>
                                <td>
                                    <input type="text" name="brig0">
                                </td>
                                <td>
                                    <input type="text" name="time0">
                                </td>
                                <td>
                                    <input type="text" name="support0">
                                </td>
                                <td>
                                    <input type="text" name="cause0">
                                </td>
                                <td>
                                    <input type="text" name="call0">
                                </td>
                            </tr>                           
                                                
                        </table>

                        <button type="button" onclick="AddLine2()" >Додати стрічку</button>
                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <br>
                    </div>

                    <input type="submit" value="Save">
      </form>            
                </div> 
                    <div class="cleaner"></div>
                    

                    <form id="twoform" method="GET" action="{{action('ReportController@create3')}}">
                        <input id="toDate" type="hidden" name="date" value="">
                        <div class="gotoback" onclick="window.history.go(-1); return false;">
                            <p>Back</p>                        
                        </div>

                        <div onclick="document.getElementById('toDate').value = document.getElementById('date').value; document.getElementById('twoform').submit();" class="gotonext"><p>Next</p></div>
                    </form>

                    

                    
                    
                <div class="cleaner"></div>
            </div> 
            

        </div> 

        <div id="templatemo_footer">
            Copyright © 2048 Your Company Name<br /> Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
        </div> 
  


</div>

@endsection