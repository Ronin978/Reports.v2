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
            <a href="{{action('FrontController@show', ['id'=>'Report1'])}}" class="bordered-feature-image"><img src="images/pic01.jpg" alt="" /></a>
            <p>
                РАПОРТ старших лікарів змін за чергування
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #2 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'Report2'])}}" class="bordered-feature-image"><img src="images/pic02.jpg" alt="" /></a>
            <p>
                Інформація по запізненнях бригад на виклики
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #3 -->
        <section>
           <a href="{{action('FrontController@show', ['id'=>'Report3'])}}" class="bordered-feature-image"><img src="images/pic03.jpg" alt="" /></a>
            <p>
                Транспортування на Луцьк (Київ)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #4 -->
        <section>            
            <a href="{{action('FrontController@show', ['id'=>'Report4'])}}" class="bordered-feature-image"><img src="images/pic04.jpg" alt="" /></a>
            <p>
                ГКС
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #5 -->
        <section>                
            <a href="{{action('FrontController@show', ['id'=>'fatal'])}}" class="bordered-feature-image"><img src="images/pic04.jpg" alt="" /></a>
            <p>
                Смертність в присутності бригади (успішна реанімація)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>            
            <a href="{{action('FrontController@show', ['id'=>'Report6'])}}" class="bordered-feature-image"><img src="images/pic04.jpg" alt="" /></a>
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
            <a href="{{action('FrontController@show', ['id'=>'dtp+ns'])}}" class="bordered-feature-image"><img src="images/pic01.jpg" alt="" /></a>
            <p>
                ДТП і «НС» (надзвичайні стани)
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #2 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'high_travmy'])}}" class="bordered-feature-image"><img src="images/pic02.jpg" alt="" /></a>
            <p>
                Складні травми
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #3 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'tr_kytyzi'])}}" class="bordered-feature-image"><img src="images/pic03.jpg" alt="" /></a>
            <p>
                Травми китиці
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #4 -->
        <section> 
            <a href="{{action('FrontController@show', ['id'=>'opic'])}}" class="bordered-feature-image"><img src="images/pic04.jpg" alt="" /></a>
            <p>
                Опіки/ Переохолодження
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #5 -->
        <section>
            <a href="{{action('FrontController@show', ['id'=>'travmat'])}}" class="bordered-feature-image"><img src="images/pic04.jpg" alt="" /></a>
            <p>
                Травматизм (кримінальний, виробничий)
            </p>
        </section>
    </div>    
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'allReports'])}}" class="bordered-feature-image"><img src="images/pic01.jpg" alt="" /></a>
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
                <h3>Сформувати повний звіт</h3>
                <blockquote>
                    <form method="GET" action="{{action('FrontController@QuickFind')}}">
                        <input type="date" name="date" value="{{date('Y-m-d')}}">

                        <input type="submit" value="Сформувати">
                    </form>
                </blockquote>
            </header>
        </section>
    </div>
    <div class="9u 12u(mobile) important(mobile)">
    <section>
	
    @if (empty($table0))
        <p>Поки, що немає доданих звітів
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
                @if ( ($key+1) % 7 == 0)
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
       

        
        <table id="table1-4">
            <tr><td colspan="9">Невідкладна допомога (ПМСД)    +</td> </tr>
            <tr>
                @for ($key=0; $key < count($region); $key++)
                    
                    <td>{{$region[$key]}}<br>
                        {{$table3[$key]}}
                    </td>
                    @if ( ($key+1) % 9 == 0)
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