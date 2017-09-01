@extends('layouts.shablon1')

@section('content')

@include('flash::message')
<div id="templatemo_wrapper">
	<div id="templatmeo_menu">
		{{$title}}
	</div>

	<div id="templatemo_main">
		<table id="twoTable" border="1">
            <tr class="firstTr">
                <td class="firstColumn">№<br>п/п</td>
                <td>Дата,час</td>
                <td>Назва «НС» (раптова смерть/ успішна реанімація)</td>
                <td>Адреса НС</td>
                <td>П.І.П потерпілого, вік</td>
                <td>№ карти виїзду</td>
                <td>№ бригади, прізвище керівника</td>
                <td>Результат (Діагноз, куди доставлено, кількість смертей на місці, л.маска/ дефібрилятор/ моніторування)</td>      
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
	</div>
	
</div>
@endsection