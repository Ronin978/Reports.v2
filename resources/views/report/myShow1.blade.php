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
                        {{($reports[$key])->day}}
                    </td>
                    <td>
                        {{($reports[$key])->night}}
                    </td>
                    <td>{{($reports[$key])->day + ($reports[$key])->night}}</td>
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
    <section align="center">  
        <div class="btn-group" onClick="CallPrint('pagePrint');">   
            <span>
                <img src="{{asset('css/ico/print.png')}}">
                Роздрукувати
            </span>
        </div>
        <div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'Report1', 'date' => $reports[0]->date])}}'">
            <span>
                <img src="{{asset('css/ico/edit.png')}}">
                Редагувати
            </span>
        </div><br>
        <div class="btn-group" onclick="window.history.go(-1); return false;">
            <span>
                Назад
                <img src="{{asset('css/ico/back.png')}}">   
            </span>                  
        </div>
        <div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'Report2'])}}'">
            <span>
                <img src="{{asset('css/ico/next.png')}}">
                Далі
            </span>
        </div><br>
    </section>
</div>
</div>
</div>
</div>
</div>
@endsection