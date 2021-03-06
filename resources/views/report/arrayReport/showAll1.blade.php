@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')	
    <section id="pagePrint">	
        <h4 align="center">Статистика за {{$date}}</h4>	
		Екстр. - {{($inf[1])[0]}}
        <br>
        Неекстр. - {{($inf[1])[1]}}

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
                        {{$allReport['day'][$key]}}
                    </td>
                    <td>
                        {{$allReport['night'][$key]}}
                    </td>
                    <td>{{$allReport['day'][$key] + $allReport['night'][$key]}}</td>
                </tr>
            @endforeach           
        </table>

		<table id="table1-2" >
            <tr>
            @foreach ($sections as $key => $sect)                
                <td>{{$sect}}<br>
                    {{($inf[4])[$key]}}
                </td>
                @if ( ($key+1) % 8 == 0)
                    </tr>
                    <tr>
                @endif            
            @endforeach
            </tr>
        </table>

        <table id="table1-3">
            <tr>
                @foreach($gospit as $key => $gosp)
                    <td>
                        {{$gosp}}<br>
                        {{($inf[2])[$key]}} 
                    </td>
                @endforeach
            </tr>
        </table>

        <table id="table1-4">
            <tr><td colspan="10">Невідкладна допомога (ПМСД)   <span id="pmcd0">0</span> + <span id="pmcd1">0</span></td> </tr>
            <tr>
                @foreach ($region as $key => $reg)                    
                    <td>{{$reg}}<br>
                        {{($inf[3])[$key]}} 
                    </td>
                    @if ( ($key+1) % 10 == 0)
                        </tr>
                        <tr>
                    @endif                
                @endforeach
            </tr>                         
        </table>
    </section>
    
</div>
</div>
</div>
</div>
</div>
@endsection