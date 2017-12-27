@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')
<section >  
    <form id="firstForm" method="POST" action="{{action('ReportController@update', ['table'=>'Report1', 'newDate'=>$date])}}">
   
        <p align="center">РАПОРТ старших лікарів змін <input type="text" name="chergovy" value="{{$reports[0]->chergovy}}"> за чергування {{$date}}.</p>       
       
        <input id="firstdate" type="hidden" name="date" value="{{$date}}"> 
        <br><br>

        Екстр. - <input type="text" id="extr" name="valuei" value="{{($inf[1])[0]}}">
        <br>
        Неекстр. - <input type="text" id="noext" name="valuei1" value="{{($inf[1])[1]}}">
       
        <table id="table1-1">
            <tr>
                <td class="firstColumn1"></td>
                <td>День</td>
                <td>Ніч</td>
                <td>Всього</td>
            </tr>                            
            @foreach ($types as $key => $type)
                <tr>
                    <td class="firstColumn1">
                        {{$type}}
                    </td>
                    <td>
                        <input id="day{{$key}}" type="text" name="day{{$key}}" oninput="oninput1({{$key}});" size="15" value="{{($reports[$key])->day}}">
                    </td>
                    <td>
                        <input id="night{{$key}}" type="text" name="night{{$key}}" oninput="oninput1({{$key}});" size="15" value="{{($reports[$key])->night}}">
                    </td>
                    <td id="res{{$key}}">{{($reports[$key])->day + ($reports[$key])->night}}</td>
                </tr>
            @endforeach
<?php
    $variable=0;
    $variable += $key;
?>           
        </table>
    
        <table id="table1-2">
            <tr>
            @foreach ($sections as $key => $sect)
                
                <td>{{$sect}}<br>
                    <input type="text" id="value{{$key+1}}" class="two" name="value{{$key+1}}" size="15" value="{{($inf[4])[$key]}}">
                </td>
                @if ( ($key+1) % 8 == 0)
                    </tr>
                    <tr>
                @endif
            
            @endforeach
            </tr>
        </table>
<?php
    $variable += $key;
?>     
        <table id="table1-3">
            <tr>
                @foreach($gospit as $key=>$gosp)
                    <td>
                        
                            {{$gosp}}<br>
                            <input type="text" id="value{{$key+count($sections)+1}}" class="two" name="value{{$key+count($sections)+1}}" value="{{($inf[2])[$key]}}">
                        
                    </td>
                @endforeach
            </tr>
        </table>
<?php
    $variable += $key - 1;
?>     
        <table id="table1-4">
            <tr><td colspan="10">Невідкладна допомога (ПМСД)   <span id="pmcd0">0</span> + <span id="pmcd1">0</span></td> </tr>
            <tr>
                @foreach ($region as $key => $reg)
                    
                    <td>{{$reg}}<br>
                        <input type="text" id="value{{$key+count($sections)+count($gospit)+1}}" name="value{{$key+count($sections)+count($gospit)+1}}" class="two" oninput = "oninput2({{$variable}}, {{$variable+count($inf[3])-1}})" size="10" value="{{($inf[3])[$key]}}">
                    </td>
                    @if ( ($key+1) % 10 == 0)
                        </tr>
                        <tr>
                    @endif
                
                @endforeach
            </tr>                         
        </table>
    
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="put"/>

        <br>

        <div class="panel" align="center">   
            <div class="btn-group" onclick="window.history.go(-1); return false;">
                <span>
                    Назад
                    <img src="{{asset('css/ico/back.png')}}">   
                </span>                  
            </div>    
            <div class="btn-group" onclick="document.getElementById('firstForm').submit();">
                <span>
                    <img src="{{asset('css/ico/save.png')}}">Зберегти
                </span>
            </div>
        </div>
        
        <script type="text/javascript">
            $( document ).ready(function() {
                document.getElementById('extr').name = 'value' + {{count($sections)+count($gospit)+count($region)+1}};
                document.getElementById('noext').name = 'value' + {{count($sections)+count($gospit)+count($region)+2}}; 
            });
        </script>
    
    </form>
</section>                
</div>
</div>
</div>
</div>
</div>

@endsection