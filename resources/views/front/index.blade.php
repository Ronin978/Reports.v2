@extends('layouts.shablon0')

@section('content')
   
<!-- Features -->

@include('flash::message')
<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
    
    <div class="3u 12u(mobile)">

        <!-- Sidebar -->
        <section>
            <header>
                <blockquote>
                    <h4>Сформувати повний звіт</h4>
                </blockquote>
            </header>   
                    <form method="GET" action="{{action('FrontController@DateFind')}}">
                        <input type="date" name="date" value="{{date('Y-m-d')}}" >

                        <input type="submit" value="Сформувати">
                    </form>                
        </section>

        <section>
            <header>
                <blockquote>
                    <h4>Вивести звіт</h4>
                </blockquote>
            </header>
                <div id="visibleForm">    
                    <form id="dateForm" method="GET" action="{{action('FrontController@QuickFind')}}">    
                        Тип звіту   
                        <select id="mySelect" name="table">
                            <?php include 'table.php' ?>
                        </select>
                        Дата<br>
                        <input type="date" name="dateStart" value="{{date('Y-m-d')}}" >
                        <input type="date" name="dateEnd" value="{{date('Y-m-d')}}" >
                        Відділення
                        <select name="viddil" id="viddil">
                            <option>Всі відділення</option>
                            <?php include 'viddil.php' ?>
                        </select>
                        
                        <input type="submit" value="Вивести">
                    </form> 
                </div>
        </section>
    </div>
    
    <div class="9u 12u(mobile) important(mobile)">
    <section>
	
@if (empty($table0))
    <p>Поки, що немає доданих звітів</p>
@else    
        <h4 align="center">РАПОРТ старших лікарів змін {{$table0->first()->chergovy}} <br>за чергування {{$date}}.</h4>

        Екстр. - {{$table4[0]}}
        <br>
        Неекстр. - {{$table4[1]}}
        
        <table id="table1-1" >
            <tr>
                <td class="firstColumn"></td>
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
                        {{ $table0[$key]->day }}
                    </td>                                   
                    <td>
                        {{ $table0[$key]->night }}
                    </td>
                    <td>
                        {{ $table0[$key]->day + $table0[$key]->night }}                               
                    </td>
                </tr>
            @endforeach
        </table>
    
        <table id="table1-2" >
            <tr>
            @for ($key=0; $key < count($sections); $key++)
                
                <td>{{$sections[$key]}}<br>
                    {{$table1[$key]}}
                </td>
                @if ( ($key+1) % 8 == 0)
                    </tr>
                    <tr>
                @endif
            
            @endfor
            </tr>
        </table>
    
        <table id="table1-3" >
            <tr>
                @for($key=0; $key < count($gospit); $key++)
                    <td>
                        {{$gospit[$key]}}
                    </td>
                @endfor
            </tr>
            <tr>
                @for($i=0; $i < count($gospit); $i++)
                    <td>
                        {{$table2[$i]}}
                    </td>
                @endfor
            </tr>
        </table>    

<?php
    $a = 0;
    $b = 0;
    for ($i=0; $i < count($table3); $i++) 
    { 
        $summa = explode("+", $table3[$i]);
            $a += intval($summa[0]);
        
        if(!empty($summa[1]))
        {
            $b += intval($summa[1]);
        }
        else {$b = 0;}
    }
?>
        <table id="table1-4">
            <tr>
                <td colspan="10">Невідкладна допомога (ПМСД)       
                <span id="sp1">{{$a}}</span> + <span id="sp2">{{$b}}</span>
                </td>
            </tr>
            <tr>
                @for ($key=0; $key < count($region); $key++)
                    
                    <td id="sum{{$key}}">{{$region[$key]}}<br>
                        {{$table3[$key]}}
                    </td>
                    @if ( ($key+1) % 10 == 0)
                        </tr>
                        <tr>
                    @endif
                                    
                @endfor
            </tr>                         
        </table>
@endif
    </section>
    </div>

</div>
</div>
</div>
</div>


@endsection