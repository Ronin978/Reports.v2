@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">   
@include('flash::message')     
<section>
		<p>РАПОРТ старших лікарів змін {{$reports1[0]->chergovy}} за чергування {{$date}}</p>

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
                @if ( ($key+1) % 7 == 0)
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
        $a += $summa[0];
         if(!empty($summa[1]))
        {
            $b += $summa[1];
        }
    }
?>        
        <table id="table1-4">
             <tr><td colspan="9">Невідкладна допомога (ПМСД)   <span>{{$a}}</span> + <span>{{$b}}</span></td> </tr>
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

        <br>
        <hr>

@if(!empty($reports2->first()))
		<p>
			Інформація по запізненнях бригад на виклики за {{$date}}
		</p>

	    <hr>

		<table id="table2">
			<tr id="firstTr">
				<td>№<br>п/п</td>
                <td>Відділення / пункт що має обслуговувати</td>
                <td>№ виїзної карти /е(н)</td>
                <td>Адреса виклику (район)</td>
                <td>№ Бригада що обслуговувала</td>
                <td>Час поступлення /Час виїзду/Час прибуття/ Тривалість запізнення (хв.)</td>
                <td id="maxLenght" class="rotate">постдиспетч підтримка</td>
                <td>Причина запізнення Відсутність вільної бр./ Відстань більше 30км/ Незадовільний стан доріг</td>
                <td>Привід до виклику /Діагноз /Госпіталізація (відмова)</td>
			</tr>
			@foreach ($reports2 as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports3->first()))
		<p>
			Транспортування на Луцьк (Київ) {{$date}}
		</p>
        <hr>

		<table id="table3">
            <tr id="firstTr3">
                <td>№<br>п/п</td>
                <td>Дата/час</td>
                <td>№ карти виїзду</td>
                <td>ПІП хворого</td>
                <td>Звідки забрано</td>
                <td id="maxLenght3" class="rotate">Куди доставлено</td>
                <td class="rotate">направлення</td>
                <td>Хто направляє</td>
                <td>Діагноз</td>
                <td>№ бр., керівник</td>
                <td>Примітки</td>
            </tr> 
			@foreach ($reports3 as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports4->first()))		

		<p>ГКС {{$date}}</p>
        <hr>
		<table id="table4">
			<tr id="firstTr4">
				<td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ карти виїзду</td>
                <td>Адреса виклику</td>
                <td>ПІП хворого</td>
                <td>Вік</td>
                <td>Діагноз</td>
                <td>№ бр.,<br> керівник</td>
                <td class="rotate">Тромболізис</td>
                <td class="rotate">Стентування</td>
                <td id="maxLenght4" class="rotate">Госпіталізація<br>(лікувальний заклад)/година</td>
                <td class="rotate">Зв’язок з лікарем консультантом
                </td>
			</tr>
			@foreach ($reports4 as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports5[0]->first()))
		<p>Смертність в присутності бригади (успішна реанімація)  {{$date}}</p>
		<hr>

		<table id="table5">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
			@foreach ($reports5[0] as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports5[1]->first()))
		<p>ДТП і «НС» (надзвичайні стани)  {{$date}}</p>
        <hr>

		<table id="table5">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
			@foreach ($reports5[1] as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports5[2]->first()))
        <p>Складні травми   {{$date}}</p>
        <hr>

		<table id="table5">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
			@foreach ($reports5[2] as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports5[3]->first()))
        <p>Травми китиці   {{$date}}</p>
        <hr>

		<table id="table5">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
			@foreach ($reports5[3] as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports5[4]->first()))
        <p>Опіки/ Переохолодження   {{$date}}</p>
        <hr>

		<table id="table5">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
			@foreach ($reports5[4] as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports5[5]->first()))
        <p>Травматизм (кримінальний, виробничий)   {{$date}}</p>
        <hr>

		<table id="table5">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
            </tr> 
			@foreach ($reports5[5] as $key=>$report)
			<tr>
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
		<br>
        <hr>
@endif
@if(!empty($reports6->first()))
        <p>Зауваження по роботі, скарги, подяки {{$date}}</p>
        <hr>

		<table id="table6">
            <tr id="firstTr">
                <td>№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ картки</td>
                <td>Відділення</td>
                <td>Примітки</td>
            </tr> 
			@foreach ($reports6 as $key=>$report)
			<tr>
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
</section>
</div>
</div>
</div>
</div>
</div>
@endsection