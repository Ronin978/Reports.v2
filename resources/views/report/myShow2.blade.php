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
		@if(!empty($viddil))
		<h4 align="center">Відділення: {{$viddil}}</h4>
		@endif
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
			@foreach ($reports as $key=>$report)			
				@if (!empty($indicator)) 
				@if (($indicator == '1') && (empty($reports[$key-1]->date)))
						<tr>
							<td colspan="9">{{$reports[$key]->date}}</td>
						</tr>
				@endif	
				@endif
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
				<td >
					{{$report->support}}
				</td>
				<td>
					{{$report->cause}}
				</td>
				<td>
					{{$report->call}}
				</td>
			</tr>			
				@if ((!empty($reports[$key+1]->date)) && ($reports[$key]->date != $reports[$key+1]->date))
					<tr>
						<td colspan="9">{{$reports[$key+1]->date}}</td>
					</tr>
				@endif			
			@endforeach
		</table>
	</section>
	<section align="center">  
	    <div class="btn-group" onClick="CallPrint('pagePrint');">   
            <span>
                <img src="{{asset('css/ico/print.png')}}">
                Роздрукувати
            </span>
        </div>
        <div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'Report2', 'date' => $reports[0]->date])}}'">
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
	    @if (!empty($reports->first()))    
	         <div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'Report3'])}}'">
	            <span>
	                <img src="{{asset('css/ico/next.png')}}">
	                Далі
	            </span>
	        </div><br>
	    @endif
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection