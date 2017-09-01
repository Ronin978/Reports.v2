@extends('layouts.shablon1')

@section('content')

@include('flash::message')
<div id="templatemo_wrapper">
	<div id="templatmeo_menu">
		{{$title}}
	</div>

	<div id="templatemo_main">
		<table id="twoTable" border="1">
			<tr>
				<td class="firstColumn">№<br>п/п</td>
                <td>Відділення / пункт що має обслуговувати</td>
                <td>№ виїзної карти /е(н)</td>
                <td>Адреса виклику (район)</td>
                <td>№ Бригада що обслуговувала</td>
                <td>Час поступлення /Час виїзду/Час прибуття/ Тривалість запізнення (хв.)</td>
                <td><div class="rotate">постдиспетч підтримка</div></td>
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
	</div>
	
</div>
@endsection