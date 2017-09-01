@extends('layouts.shablon1')

@section('content')

@include('flash::message')
<div id="templatemo_wrapper">
	<div id="templatmeo_menu">
		{{$title}}
	</div>

	<div id="templatemo_main">
		<table id="table4" border="1">
			<tr class="firstTr">
				<td class="firstColumn">№<br>п/п</td>
                <td>Дата,час</td>
                <td>№ карти виїзду</td>
                <td>Адреса виклику</td>
                <td>ПІП хворого</td>
                <td>Вік</td>
                <td>Діагноз</td>
                <td>№ бр.,<br> керівник</td>
                <td><div class="rotate">Тромболізис</div></td>
                <td><div class="rotate">Стентування</div></td>
                <td><div class="rotate">Госпіталізація<br>(лікувальний заклад)/година</div></td>
                <td><div class="rotate">Зв’язок з лікарем консультантом</div>
                </td>
			</tr>
			@foreach ($reports as $key=>$report)
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
	</div>
	
</div>
@endsection