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
                ДТП
            </p>
        </section>
    </div>
    <div class="2u 12u(mobile)">

        <!-- Feature #6 -->
        <section>      
            <a href="{{action('FrontController@show', ['id'=>'ns'])}}" class="bordered-feature-image"><img src="{{asset('images/all.png')}}" alt="" /></a>
            <p>
                «НС» (надзвичайні стани)
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
    <section id="pagePrint">
	
@if (empty($reports1->first()))
    <p>Поки, що немає доданих звітів</p>
@else    
         <a onClick="CallPrint('pagePrint');">Роздрукувати</a><br>
         
       <h5>РАПОРТ старших лікарів змін {{$reports1[0]->chergovy}} за чергування {{$date}}</h5>

        Екстр. - {{($inf[1])[0]}}
        <br>
        Неекстр. - {{($inf[1])[1]}}

        <table class="table1-1">
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
                        {{($reports1[$key])->day}}
                    </td>
                    <td>
                        {{($reports1[$key])->night}}
                    </td>
                    <td>{{($reports1[$key])->day + ($reports1[$key])->night}}</td>
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
       
<?php
    $a = 0;
    $b = 0;
    for ($i=0; $i < count($inf[3]); $i++) 
    { 
        $summa = explode("+", $inf[3][$i]);
        $a += intval($summa[0]);
         if(!empty($summa[1]))
        {
            $b += intval($summa[1]);
        }
    }
?>        
        <table id="table1-4">
             <tr><td colspan="10">Невідкладна допомога (ПМСД)   <span>{{$a}}</span> + <span>{{$b}}</span></td> </tr>
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
        <hr>

@if(!empty($reports2->first()))
        <h5>
            Інформація по запізненнях бригад на виклики за {{$date}}
        </h5>
        <table id="table2">
            <tr>
                <td class="col_3">№<br>п/п</td>
                <td class="col_15">Відділення / пункт що має обслуговувати</td>
                <td class="col_8">№ виїзної карти /е(н)</td>
                <td class="col_15">Адреса виклику (район)</td>
                <td class="col_10">№ Бригада що обслуговувала</td>
                <td class="col_15">Час поступлення /Час виїзду/Час прибуття/ Тривалість запізнення (хв.)</td>
                <td class="col_5 rotate45">постдиспетч<br> підтримка</td>
                <td class="col_10">Причина запізнення Відсутність вільної бр./ Відстань більше 30км/ Незадовільний стан доріг</td>
                <td>Привід до виклику /Діагноз /Госпіталізація (відмова)</td>
            </tr>
            @foreach ($reports2 as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->punkt}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->adress}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->time}}
                </td>
                <td>
                    {{$report->support}}
                </td>
                <td>
                    {{$report->cause}}
                </td>
                <td>
                    {{$report->call}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports3->first()))
        <h5>
            Транспортування на Луцьк (Київ) {{$date}}
        </h5>
        <table id="table3">
            <tr style="height: 130px;">
                <td class="col_3">№<br>п/п</td>
                <td class="col_8">Дата/час</td>
                <td class="col_8">№ карти виїзду</td>
                <td class="col_12">ПІП хворого</td>
                <td class="col_15">Звідки забрано</td>
                <td class="col_8 maxLenght">Куди доставлено</td>
                <td class="col_3 rotate_two">направлення</td>
                <td class="col_10">Хто направляє</td>
                <td >Діагноз</td>
                <td class="col_10">№ бр., керівник</td>
                <td class="col_8">Примітки</td>
            </tr> 
            @foreach ($reports3 as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->pib}}
                </td>
                <td>
                    {{$report->at}}
                </td>
                <td>
                    {{$report->from}}
                </td>
                <td>
                    {{$report->direct}}
                </td>
                <td>
                    {{$report->who_direct}}
                </td>
                <td>
                    {{$report->diagnoz}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->other}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports4->first()))     

        <h5>ГКС {{$date}}</h5>
        <table id="table4">
            <tr style="height: 200px;">
                <td class="col_3">№<br>п/п</td>
                <td class="col_8">Дата,час</td>
                <td class="col_8">№ карти виїзду</td>
                <td class="col_10">Адреса виклику</td>
                <td class="col_12">ПІП хворого</td>
                <td class="col_5">Вік</td>
                <td >Діагноз</td>
                <td class="col_15">№ бр.,<br> керівник</td>
                <td class="col_3 rotate">Тромболізис</td>
                <td class="col_3 rotate">Стентування</td>
                <td class="col_15 maxLenght"><small>Госпіталізація(лікувальний заклад)/година</small></td>
                <td class="col_5 rotate_two"><small>Зв’язок&nbspз&nbspлікарем<br> консультантом</small>
                </td>
            </tr>
            @foreach ($reports4 as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->adress}}
                </td>
                <td>
                    {{$report->pib}}
                </td>
                <td>
                    {{$report->age}}
                </td>
                <td>
                    {{$report->diagnoz}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->tromb}}
                </td>
                <td>
                    {{$report->stent}}
                </td>
                <td>
                    {{$report->gospital}}
                </td>
                <td>
                    {{$report->support}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports5[0]->first()))
        <h5>Смертність в присутності бригади (успішна реанімація)  {{$date}}</h5>
        <table id="table5">
            <tr>
                <td class="col_3">№<br>п/п</td>
                <td class="col_10">Дата,час</td>
                <td class="col_12">Смертність в присутності бригади (успішна реанімація)</td>
                <td class="col_12">Адреса НС</td>
                <td class="col_15">П.І.П потерпілого, вік</td>
                <td class="col_10">№ карти виїзду</td>
                <td class="col_10">№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
            @foreach ($reports5[0] as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->title}}
                </td>
                <td>
                    {{$report->adress}}
                </td>
                <td>
                    {{$report->pib}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->other}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports5[1]->first()))
        <h5>ДТП і «НС» (надзвичайні стани)  {{$date}}</h5>
        <table id="table5">
            <tr id="firstTr">
                <td class="col_3">№<br>п/п</td>
                <td class="col_10">Дата,час</td>
                <td class="col_12">ДТП і «НС» (надзвичайні стани)</td>
                <td class="col_12">Адреса НС</td>
                <td class="col_15">П.І.П потерпілого, вік</td>
                <td class="col_10">№ карти виїзду</td>
                <td class="col_10">№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
            @foreach ($reports5[1] as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->title}}
                </td>
                <td>
                    {{$report->adress}}
                </td>
                <td>
                    {{$report->pib}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->other}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports5[2]->first()))
        <h5>Складні травми   {{$date}}</h5>
        <table id="table5">
            <tr id="firstTr">
               <td class="col_3">№<br>п/п</td>
                <td class="col_10">Дата,час</td>
                <td class="col_12">Складні травми</td>
                <td class="col_12">Адреса НС</td>
                <td class="col_15">П.І.П потерпілого, вік</td>
                <td class="col_10">№ карти виїзду</td>
                <td class="col_10">№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
            @foreach ($reports5[2] as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->title}}
                </td>
                <td>
                    {{$report->adress}}
                </td>
                <td>
                    {{$report->pib}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->other}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports5[3]->first()))
        <h5>Травми китиці   {{$date}}</h5>
        <table id="table5">
            <tr id="firstTr">
               <td class="col_3">№<br>п/п</td>
                <td class="col_10">Дата,час</td>
                <td class="col_12">Травми китиці</td>
                <td class="col_12">Адреса НС</td>
                <td class="col_15">П.І.П потерпілого, вік</td>
                <td class="col_10">№ карти виїзду</td>
                <td class="col_10">№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
            @foreach ($reports5[3] as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->title}}
                </td>
                <td>
                    {{$report->adress}}
                </td>
                <td>
                    {{$report->pib}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->other}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports5[4]->first()))
        <h5>Опіки/ Переохолодження   {{$date}}</h5>
        <table id="table5">
            <tr id="firstTr">
               <td class="col_3">№<br>п/п</td>
                <td class="col_10">Дата,час</td>
                <td class="col_12">Опіки/ Переохолодження</td>
                <td class="col_12">Адреса НС</td>
                <td class="col_15">П.І.П потерпілого, вік</td>
                <td class="col_10">№ карти виїзду</td>
                <td class="col_10">№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
            @foreach ($reports5[4] as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->title}}
                </td>
                <td>
                    {{$report->adress}}
                </td>
                <td>
                    {{$report->pib}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->other}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports5[5]->first()))
        <h5>Травматизм (кримінальний, виробничий)   {{$date}}</h5>
        <table id="table5">
            <tr id="firstTr">
                <td class="col_3">№<br>п/п</td>
                <td class="col_10">Дата,час</td>
                <td class="col_12">Травматизм (кримінальний, виробничий)</td>
                <td class="col_12">Адреса НС</td>
                <td class="col_15">П.І.П потерпілого, вік</td>
                <td class="col_10">№ карти виїзду</td>
                <td class="col_10">№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
            @foreach ($reports5[5] as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->title}}
                </td>
                <td>
                    {{$report->adress}}
                </td>
                <td>
                    {{$report->pib}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->brig}}
                </td>
                <td>
                    {{$report->other}}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
@endif
@if(!empty($reports6->first()))
        <h5>Зауваження по роботі, скарги, подяки {{$date}}</h5>
        <table id="table6">
            <tr id="firstTr">
                <td class="col_5">№<br>п/п</td>
                <td class="col_12">Дата,час</td>
                <td class="col_12">№ картки</td>
                <td class="col_20">Відділення</td>
                <td>Примітки</td>
            </tr> 
            @foreach ($reports6 as $key=>$report)
            <tr class="words">
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$report->date}}
                </td>
                <td>
                    {{$report->no_card}}
                </td>
                <td>
                    {{$report->subdiv}}
                </td>
                <td>
                    {{$report->other}}
                </td>
            </tr>
            @endforeach
        </table>
@endif
@endif
    </section>
    </div>

</div>
</div>
</div>
</div>
<script type="text/javascript">
    var el = document.getElementById('features-wrapper');
    el.parentNode.removeChild(el);
</script>

@endsection