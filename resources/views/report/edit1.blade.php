@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')
 <section >  
    <form id="firstForm" method="POST" action="{{action('ReportController@store1')}}">
   
        <p align="center">РАПОРТ старших лікарів змін <input type="text" name="chergovy"> за чергування {{date("l / «d» F Y")}}.</p>       
       
        Дата: <input id="firstdate" type="date" name="date" value="{{date('Y-m-d')}}"> 
        <br><br>

        Екстр. - <input type="text" id="extr" name="value52">
        <br>
        Неекстр. - <input type="text" id="noext" name="value53">
       
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
                        <input type="text" name="day{{$key}}" oninput="oninputt('{{$key}}');" size="15">
                    </td>
                    <td>
                        <input type="text" name="night{{$key}}" oninput="oninputt('{{$key}}');" size="15">
                    </td>
                    <td></td>
                </tr>
            @endforeach
           
        </table>
    
        <table id="table1-2">
            <tr>
            @foreach ($sections as $key => $sect)
                
                <td>{{$sect}}<br>
                    <input type="text" id="value{{$key+1}}" class="two" name="value{{$key+1}}" size="15">
                </td>
                @if ( ($key+1) % 7 == 0)
                    </tr>
                    <tr>
                @endif
            
            @endforeach
            </tr>
        </table>
    
        <table id="table1-3">
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
                        <input type="text" id="value{{$i}}" class="two" name="value{{$i}}">
                    </td>
                @endfor
            </tr>
        </table>

       
        <table id="table1-4">
            <tr><td colspan="9">Невідкладна допомога (ПМСД)   <span id="pmcd0">0</span> + <span id="pmcd1">0</span></td> </tr>
            <tr>
                @foreach ($region as $key => $reg)
                    
                    <td>{{$reg}}<br>
                        <input type="text" id="value{{$key+count($sections)+count($gospit)+1}}" name="value{{$key+count($sections)+count($gospit)+1}}" class="two" oninput = "oninput2()" size="10">
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

        <input type="submit" value="Save">
    
    </form>
</section>                
</div>
</div>
</div>
</div>
</div>
@endsection