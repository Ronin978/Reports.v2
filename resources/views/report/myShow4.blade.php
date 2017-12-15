@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section id="pagePrint">	
		<h4 align="center">ГКС за {{$date}}</h4>
		@if(!empty($viddil))
		<h4 align="center">Відділення: {{$viddil}}</h4>
		@endif
		<table id="table4">
			<tr id="firstTr" style="height: 200px;">
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
			@foreach ($reports as $key=>$report)
				@if (!empty($indicator)) 
				@if (($indicator == '1') && (empty($reports[$key-1]->date)))					
						<tr>
							<td colspan="12">{{$reports[$key]->date}}</td>
						</tr>
				@endif	
				@endif
			<tr class="words">
				<td>
					{{$key+1}}
				</td>
				<td>
					{{$report->timer}}
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
				@if ((!empty($reports[$key+1]->date)) && ($reports[$key]->date != $reports[$key+1]->date))
					<tr>
						<td colspan="12">{{$reports[$key+1]->date}}</td>
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
        <div class="btn-group" onclick="location.href='{{action('FrontController@edit', ['table'=>'Report4', 'date' => $reports[0]->date])}}'">
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
	         <div class="btn-group" onclick="location.href='{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'fatal'])}}'">
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