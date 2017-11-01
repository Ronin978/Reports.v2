@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section id="pagePrint">	
		<h4 align="center" >ГКС за {{$date}}</h4>
		<table id="table4">
			<tr id="firstTr">
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
                <td id="maxLenght"  class="rotate">Госпіталізація<br>(лікувальний заклад)/година</td>
                <td class="rotate">Зв’язок з лікарем консультантом
                </td>
			</tr>
			@foreach ($reports as $key=>$report)
				@if (!empty($indicator)) 
				@if (($indicator == '1') && (empty($reports[$key-1]->date)))
					
						<tr>
							<td colspan="9">{{$reports[$key]->date}}</td>
						</tr>
				@endif	
				@endif
			<tr>
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
						<td colspan="9">{{$reports[$key+1]->date}}</td>
					</tr>
				@endif
			@endforeach
		</table>
	</section>
	<section>  
	    <div class="btn-group">
	    @if (!empty($reports->first())) 
	        <a href="{{action('FrontController@myShow', ['date' => $reports[0]->date, 'table'=>'fatal'])}}">
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