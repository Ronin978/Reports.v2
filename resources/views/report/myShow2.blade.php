@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section id="pagePrint">	
		<h4 align="center">Інформація по запізненнях бригад на виклики за {{$date}}</h4>
		<table id="table2">
			<tr id="firstTr">
				<td >№<br>п/п</td>
                <td>Відділення / пункт що має обслуговувати</td>
                <td>№ виїзної карти /е(н)</td>
                <td>Адреса виклику (район)</td>
                <td>№ Бригада що обслуговувала</td>
                <td>Час поступлення /Час виїзду/Час прибуття/ Тривалість запізнення (хв.)</td>
                <td id="maxLenght" class="rotate">постдиспетч підтримка</td>
                <td>Причина запізнення Відсутність вільної бр./ Відстань більше 30км/ Незадовільний стан доріг</td>
                <td>Привід до виклику /Діагноз /Госпіталізація (відмова)</td>
			</tr>
			@foreach ($reports as $key=>$report)			
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
	</section>
	<section>  
	    <div class="btn-group"> 
	    @if (!empty($reports->first()))    
	        <a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'Report3'])}}">
	            Слідуюча таблиця
	        </a>
	    @endif
	        <div class="gotoback" onclick="window.history.go(-1); return false;">
	            <p>Назад</p>                        
	        </div>
	        <a onClick="CallPrint('pagePrint');">   
	            Роздрукувати
	        </a>
	    </div>
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection