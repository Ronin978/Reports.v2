@extends('layouts.shablon0')

@section('content')

<div id="content-wrapper">
<div id="content">
<div class="container">
<div class="row">
<div class="12u">	
@include('flash::message')
	<section >	
		<h3 align="center" >{{$title}} за {{$report->date}}</h3>
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
			@endforeach
		</table>
	</section>
</div>
</div>
</div>
</div>
</div>
@endsection