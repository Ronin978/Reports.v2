@extends('layouts.shablon1')

@section('content')

@include('flash::message')
<div id="templatemo_wrapper">
	<div id="templatmeo_menu">
		<p>РАПОРТ старших лікарів змін {{$reports[0]->chergovy}} за чергування {{$date}}</p>
	</div>

	<div id="templatemo_main">

		Екстр. - {{($inf[1])[0]}}
        <br>
        Неекстр. - {{($inf[1])[1]}}

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
                        {{($reports[$key])->day}}
                    </td>
                    <td>
                        {{($reports[$key])->night}}
                    </td>
                    <td>{{($reports[$key])->day + ($reports[$key])->night}}</td>
                </tr>
            @endforeach
           
        </table>

		<table id="myTable" class="table mytable" >
            <tr>
            @foreach ($sections as $key => $sect)
                
                <td>{{$sect}}<br>
                    {{($inf[4])[$key]}}
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
                @foreach($gospit as $key => $gosp)
                    <td>
                        {{$gosp}}<br>
                        {{($inf[2])[$key]}} 
                    </td>
                @endforeach
            </tr>
            
        </table>

        <p>Невідкладна допомога (ПМСД)   <span id="pmcd0">0</span> + <span id="pmcd1">0</span></p>

        <table class="table mytable">
            <tr>
                @foreach ($region as $key => $reg)
                    
                    <td>{{$reg}}<br>
                        {{($inf[3])[$key]}} 
                    </td>
                    @if ( ($key+1) % 9 == 0)
                        </tr>
                        <tr>
                    @endif
                
                @endforeach
            </tr>                         
        </table>

	</div>
	
</div>
@endsection