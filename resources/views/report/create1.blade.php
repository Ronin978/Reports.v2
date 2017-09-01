@extends('layouts.shablon1')

@section('content')

@include('flash::message')

<div id="templatemo_wrapper">
     
    <form id="firstForm" method="POST" action="{{action('ReportController@store1')}}">

        <div id="templatmeo_menu">
            <p align="center">РАПОРТ старших лікарів змін <input type="text" name="chergovy"> за чергування 
                {{date("l / «d» F Y")}}.</p>
        </div>
        <div id="templatemo_main">
    	   <div id="home" class="main_box">
        	   <div class="col col-my">
                    Дата: <input id="firstdate" type="date" name="date" value="{{date('Y-m-d')}}"> 
                    <br><br>

                    Екстр. - <input type="text" id="extr" name="value_i">
                    <br>
                    Неекстр. - <input type="text" id="noext" name="value_i+1">
                    <div align="center">
                        <table class="mytable">
                            <tr>
                                <td class="firstColumn"></td>
                                <td>День</td>
                                <td>Ніч</td>
                                <td>Всього</td>
                            </tr>                            
                            @foreach ($types as $key => $type)
                                <tr>
                                    <td class="firstColumn">
                                        {{$type}}
                                    </td>
                                    <td>
                                        <input type="text" name="day{{$key}}" oninput="oninputt('{{$key}}');">
                                    </td>
                                    <td>
                                        <input type="text" name="night{{$key}}" oninput="oninputt('{{$key}}');">
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                           
                        </table>
                    
                        <table id="myTable" class="table mytable" >
                            <tr>
                            @foreach ($sections as $key => $sect)
                                
                                <td>{{$sect}}<br>
                                    <input type="text" id="value{{$key+1}}" class="two" name="value{{$key+1}}" value="{{$key+1}}">
                                </td>
                                @if ( ($key+1) % 7 == 0)
                                    </tr>
                                    <tr>
                                @endif
                            
                            @endforeach
                            </tr>
                        </table>
                    
                        <table class="table mytable">
                            <tr>
                                @foreach($gospit as $gosp)
                                    <td>
                                        {{$gosp}}
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                @for ($i=$key+2; $i <= count($sections)+count($gospit); $i++)
                                    <td>
                                        <input type="text" id="value{{$i}}" class="two" name="value{{$i}}" value="{{$i}}">
                                    </td>
                                @endfor
                            </tr>
                        </table>

                        <p>Невідкладна допомога (ПМСД)   <span id="pmcd0">0</span> + <span id="pmcd1">0</span></p>
                        <table class="table mytable">
                            <tr>
                                @foreach ($region as $key => $reg)
                                    
                                    <td>{{$reg}}<br>
                                        <input type="text" id="value{{$key+count($sections)+count($gospit)+1}}" name="value{{$key+count($sections)+count($gospit)+1}}" class="two" value="1+2" oninput = "oninput2()">
                                    </td>
                                    @if ( ($key+1) % 9 == 0)
                                        </tr>
                                        <tr>
                                    @endif
                                
                                @endforeach
                            </tr>                         
                        </table>
                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <br>
                    </div>

                    <input type="submit" value="Save">
    </form>
                </div> 
                    
                   <form id="twoform" method="GET" action="{{action('ReportController@create2')}}">
                        <input id="toDate" type="hidden" name="date" value="">
                       

                        <div onclick="document.getElementById('toDate').value = document.getElementById('firstdate').value; document.getElementById('twoform').submit();" class="gotonext">Next</div>
                    </form>

                <div class="cleaner"></div>
            </div> 
            

        </div> 

        <div id="templatemo_footer">
            Copyright © 2048 Your Company Name<br /> Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
        </div> 
    


</div>

@endsection