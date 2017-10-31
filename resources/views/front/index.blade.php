@extends('layouts.shablon0')

@section('content')
   
<!-- Features -->
<div id="features-wrapper">
<div id="features">
<div class="container">
<div class="row">

    <div class="2u 12u(mobile)">

        <!-- Feature #1 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'Report1'])}}" class="bordered-feature-image"><img src="{{asset('images/stat.png')}}" alt="" /></a>
            <p>
                Статистика
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #2 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'Report2'])}}" class="bordered-feature-image"><img src="{{asset('images/tolate.png')}}" alt="" /></a>
            <p>
                Інформація по запізненнях бригад на виклики
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #3 -->
        <section>
           <a href="{{action('FrontController@show', ['id'=>'Report3'])}}" class="bordered-feature-image"><img src="{{asset('images/transfer.png')}}" alt="" /></a>
            <p>
                Транспортування на Луцьк (Київ)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #4 -->
        <section>            
            <a href="{{action('FrontController@show', ['id'=>'Report4'])}}" class="bordered-feature-image"><img src="{{asset('images/gks.png')}}" alt="" /></a>
            <p>
                ГКС
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #5 -->
        <section>                
            <a href="{{action('FrontController@show', ['id'=>'fatal'])}}" class="bordered-feature-image"><img src="{{asset('images/fatal.png')}}" alt="" /></a>
            <p>
                Смертність в присутності бригади (успішна реанімація)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>            
            <a href="{{action('FrontController@show', ['id'=>'Report6'])}}" class="bordered-feature-image"><img src="{{asset('images/remark.png')}}" alt="" /></a>
            <p>
                Зауваження по роботі, скарги, подяки
            </p>
        </section>
    </div>
</div>
<div class="row">
    <div class="2u 12u(mobile)">

        <!-- Feature #1 -->
        <section> 
            <a href="{{action('FrontController@show', ['id'=>'dtp+ns'])}}" class="bordered-feature-image"><img src="{{asset('images/dtp_ns.png')}}" alt="" /></a>
            <p>
                ДТП і «НС» (надзвичайні стани)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #2 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'high_travmy'])}}" class="bordered-feature-image"><img src="{{asset('images/higch.png')}}" alt="" /></a>
            <p>
                Складні травми
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #3 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'tr_kytyzi'])}}" class="bordered-feature-image"><img src="{{asset('images/kytyzi.png')}}" alt="" /></a>
            <p>
                Травми китиці
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #4 -->
        <section> 
            <a href="{{action('FrontController@show', ['id'=>'opic'])}}" class="bordered-feature-image"><img src="{{asset('images/opic.png')}}" alt="" /></a>
            <p>
                Опіки/ Переохолодження
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #5 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'travmat'])}}" class="bordered-feature-image"><img src="{{asset('images/criminal.png')}}" alt="" /></a>
            <p>
                Травматизм (кримінальний, виробничий)
            </p>
        </section>
    </div>    
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'allReports'])}}" class="bordered-feature-image"><img src="{{asset('images/all.png')}}" alt="" /></a>
            <p>
                Повний рапорт старших лікарів
            </p>
        </section>
    </div>    
</div>
</div>
</div>
</div>
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
                    <form method="GET" action="{{action('FrontController@QuickFind')}}">    
                        Тип звіту   
                        <select id="mySelect" name="table">
                            <option selected value="Report1">РАПОРТ старших лікарів змін</option>
                            <option value="Report2">Інформація по запізненнях бригад на виклики</option>
                            <option value="Report3">Транспортування на Луцьк</option>
                            <option value="Report4">ГКС</option>
                            <option value="fatal">Смертність в присутності бригади (успішна реанімація)</option>
                            <option value="dtp+ns">ДТП і «НС» (надзвичайні стани)</option>
                            <option value="high_travmy">Складні травми</option>
                            <option value="tr_kytyzi">Травми китиці</option>
                            <option value="opic">Опіки/ Переохолодження</option>
                            <option value="travmat">Травматизм (кримінальний, виробничий)</option>
                            <option value="Report6">Зауваження по роботі, скарги, подяки</option>
                        </select>
                        
                        <input type="date" name="dateStart" value="{{date('Y-m-d')}}" >
                        <input type="date" name="dateEnd" value="{{date('Y-m-d')}}" >

                        <input type="submit" value="Вивести">
                    </form>
               
        </section>

    </div>


    
    <div class="9u 12u(mobile) important(mobile)">
    <section>
	
@if (empty($table0))
    <p>Поки, що немає доданих звітів</p>
@else    
        <h5 align="center">РАПОРТ старших лікарів змін {{$table0->first()->chergovy}} <br>за чергування {{$date}}.</h5>

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